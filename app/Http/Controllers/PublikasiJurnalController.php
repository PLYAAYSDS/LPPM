<?php

namespace App\Http\Controllers;
use App\publikasi_jurnal;
use App\Mahasiswa;
use App\Pegawai;
use App\lppm_luaran_anggota_dosen;
use App\lppm_luaran_anggota_mahasiswa;
use App\lppm_luaran_anggota_pegawai;
use Illuminate\Http\Request;
use Validator;
// use Illuminate\Support\Facades\Validator;

class PublikasiJurnalController extends Controller
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

        return view("publikasiJurnal.create",compact('mahasiswa','dosen','pegawai'));
    }


    public function create(Request $request){

        $baseLuaran  = "../public/uploadLuaran/";
        $fileLuaran = $request->file('Luaran');
        $pathLuaran = $fileLuaran->getClientOriginalName();
        $respLuaran = $fileLuaran->move('uploadLuaran',$pathLuaran);

        $publikasi_jurnal = new publikasi_jurnal();
        $dosen = auth()->user()->id;

        $nama = $request->input('luaran_nama');
        $publikasi_jurnal->luaran_tipe = "Publikasi di Jurnal";
        $publikasi_jurnal->status_id = 17;       
        $publikasi_jurnal->dosen_id = $dosen;     
        $publikasi_jurnal->luaran_tahun = $request->input('luaran_tahun');
        $publikasi_jurnal->luaran_jenis = $request->input('luaran_jenis');
        $publikasi_jurnal->luaran_jenis_jurnal = $request->input('luaran_jenis_jurnal');
        $publikasi_jurnal->luaran_p_issn = $request->input('luaran_p_issn');
        $publikasi_jurnal->luaran_e_issn = $request->input('luaran_e_issn');
        $publikasi_jurnal->luaran_volume = $request->input('luaran_volume');
        $publikasi_jurnal->luaran_nama = $request->input('luaran_nama');
        $publikasi_jurnal->luaran_nomor = $request->input('luaran_nomor');
        $publikasi_jurnal->luaran_halaman_awal = $request->input('luaran_halaman_awal');
        $publikasi_jurnal->luaran_halaman_akhir = $request->input('luaran_halaman_akhir');
        $publikasi_jurnal->luaran_url = $request->input('luaran_url');
        $publikasi_jurnal->luaran_file = $pathLuaran;
        $publikasi_jurnal->save();

        $id = publikasi_jurnal::select("luaran_id")->where('luaran_nama','=',$nama)->first();
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
        return redirect('/publikasijurnal');
    }

}
