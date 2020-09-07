<?php

namespace App\Http\Controllers;
use App\publikasi_forum_ilmiah;
use App\Mahasiswa;
use App\Pegawai;
use App\lppm_luaran_anggota_dosen;
use App\lppm_luaran_anggota_mahasiswa;
use App\lppm_luaran_anggota_pegawai;
use Illuminate\Http\Request;
use Validator;

class PublikasiForumIlmiahController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function index()
    {
        $mahasiswa = Mahasiswa::select('dim_id','nama')->where('status_akhir','=','Aktif')->get();
        $dosen = Pegawai::select('pegawai_id','nama')->where('status_akhir','=','A')->get();
        $pegawai = Pegawai::select('pegawai_id','nama')->whereNull('status_akhir')->get();

        return view("publikasiForumIlmiah.create",compact('mahasiswa','dosen','pegawai'));
    }


    public function create(Request $request){

        $baseLuaran  = "../public/uploadLuaran/";
        $fileLuaran = $request->file('Luaran');
        $pathLuaran = $fileLuaran->getClientOriginalName();
        $respLuaran = $fileLuaran->move('uploadLuaran',$pathLuaran);

       $publikasi_forum_ilmiah = new publikasi_forum_ilmiah();
       $dosen = auth()->user()->id;

        $nama = $request->input('luaran_nama');
        $publikasi_forum_ilmiah->luaran_tipe = "Pemakalah di forum ilmiah";
        $publikasi_forum_ilmiah->status_id = 17;        
        $publikasi_forum_ilmiah->dosen_id = $dosen;  
        $publikasi_forum_ilmiah->luaran_tahun = $request->input('luaran_tahun');
        $publikasi_forum_ilmiah->luaran_tingkat_forum_ilmiah = $request->input('luaran_tingkat_forum_ilmiah');
        $publikasi_forum_ilmiah->luaran_nama = $request->input('luaran_nama');
        $publikasi_forum_ilmiah->luaran_nama_forum = $request->input('luaran_nama_forum');
        $publikasi_forum_ilmiah->luaran_institusi_penyelenggara = $request->input('luaran_institusi_penyelenggara');
        $publikasi_forum_ilmiah->luaran_tempat_pelaksanaan = $request->input('luaran_tempat_pelaksanaan');
        $publikasi_forum_ilmiah->luaran_isbn = $request->input('luaran_isbn');
        $publikasi_forum_ilmiah->luaran_file = $pathLuaran;
        $publikasi_forum_ilmiah->save();

        $id = publikasi_forum_ilmiah::select("luaran_id")->where('luaran_nama','=',$nama)->first();
        $id->luaran_id;


        $rules = [];
        // $rulesDosenLuar = array(
        //     'anggota_dosen_luar_nama.*'
        // );


        foreach($request->input('dosen') as $key => $value) {
            $rules["dosen.{$key}"] = 'required' ;
        }

        foreach($request->input('mahasiswa') as $key => $value) {
            $rules["mahasiswa.{$key}"] = 'required' ;
        }

        foreach($request->input('pegawai') as $key => $value) {
            $rules["pegawai.{$key}"] = 'required' ;
        }

        // $anggota_dosen_luar_nama = $request->anggota_dosen_luar_nama;

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {

            foreach($request->input('dosen') as $key => $value) {
                $tag = new lppm_luaran_anggota_dosen();
                $tag->dosen_id = $value;
                $tag->luaran_id = $id->luaran_id;
                $tag->save();


            }

            foreach($request->input('mahasiswa') as $key => $value) {
                $tag = new lppm_luaran_anggota_mahasiswa();
                $tag->dim_id = $value;
                $tag->luaran_id = $id->luaran_id;
                $tag->save();


            }

            foreach($request->input('pegawai') as $key => $value) {
                $tag = new lppm_luaran_anggota_pegawai();
                $tag->pegawai_id = $value;
                $tag->luaran_id = $id->luaran_id;
                $tag->save();

            }

        }

        return redirect('/publikasiforumilmiah');
    }

}
