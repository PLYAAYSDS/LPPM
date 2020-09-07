<?php

namespace App\Http\Controllers;
use App\publikasi_media_masa;
use App\Mahasiswa;
use App\Pegawai;
use App\lppm_luaran_anggota_dosen;
use App\lppm_luaran_anggota_mahasiswa;
use App\lppm_luaran_anggota_pegawai;
use Illuminate\Http\Request;
use Validator;

class PublikasiMediaMasaController extends Controller
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

        return view("publikasiMediaMasa.create",compact('mahasiswa','dosen','pegawai'));
    }


    public function create(Request $request){

        $baseLuaran  = "../public/uploadLuaran/";
        $fileLuaran = $request->file('Luaran');
        $pathLuaran = $fileLuaran->getClientOriginalName();
        $respLuaran = $fileLuaran->move('uploadLuaran',$pathLuaran);

       $publikasi_media_massa = new publikasi_media_masa();
       $dosen = auth()->user()->id;

        $nama = $request->input('luaran_nama');
        $publikasi_media_massa->luaran_tipe = "Publikasi di media massa";
        $publikasi_media_massa->status_id = 17;        
        $publikasi_media_massa->dosen_id = $dosen;     
        $publikasi_media_massa->luaran_tahun = $request->input('luaran_tahun');
        $publikasi_media_massa->luaran_tanggal_publikasi = $request->input('luaran_tanggal_publikasi');
        $publikasi_media_massa->luaran_jenis = $request->input('luaran_jenis');
        $publikasi_media_massa->luaran_jenis_media = $request->input('luaran_jenis_media');
        $publikasi_media_massa->luaran_nama = $request->input('luaran_nama');
        $publikasi_media_massa->luaran_volume = $request->input('luaran_volume');
        $publikasi_media_massa->luaran_nomor = $request->input('luaran_nomor');
        $publikasi_media_massa->luaran_halaman_awal = $request->input('luaran_nomor');
        $publikasi_media_massa->luaran_halaman_awal = $request->input('luaran_halaman_awal');
        $publikasi_media_massa->luaran_halaman_akhir = $request->input('luaran_halaman_akhir');
        $publikasi_media_massa->luaran_url = $request->input('luaran_url');
        $publikasi_media_massa->luaran_file = $pathLuaran;
        $publikasi_media_massa->save();

        $id = publikasi_media_masa::select("luaran_id")->where('luaran_nama','=',$nama)->first();
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

        return redirect('/publikasimediamasa');
    }

}
