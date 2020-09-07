<?php

namespace App\Http\Controllers;
use App\produk_tersertifikasi;
use App\Mahasiswa;
use App\Pegawai;
use App\lppm_luaran_anggota_dosen;
use App\lppm_luaran_anggota_mahasiswa;
use App\lppm_luaran_anggota_pegawai;
use Illuminate\Http\Request;
use Validator;

class ProdukTersertifikasiController extends Controller
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

        return view("produkTersertifikasi.create",compact('mahasiswa','dosen','pegawai'));
    }

    public function create(Request $request){

        $baseLuaran  = "../public/uploadLuaran/";
        $fileLuaran = $request->file('Luaran');
        $pathLuaran = $fileLuaran->getClientOriginalName();
        $respLuaran = $fileLuaran->move('uploadLuaran',$pathLuaran);

        $produk_tersertifikasi = new produk_tersertifikasi();

        $dosen = auth()->user()->id;
        $nama = $request->input('luaran_nama');
        $produk_tersertifikasi->luaran_tipe = "Produk tersertifikasi";
        $produk_tersertifikasi->status_id = 17;
        $produk_tersertifikasi->dosen_id = $dosen;
        $produk_tersertifikasi->luaran_tahun = $request->input('luaran_tahun');
        $produk_tersertifikasi->luaran_nama = $request->input('luaran_nama');
        $produk_tersertifikasi->luaran_lembaga = $request->input('luaran_lembaga');
        $produk_tersertifikasi->luaran_nomor = $request->input('luaran_nomor');
        $produk_tersertifikasi->luaran_file = $pathLuaran;
        $produk_tersertifikasi->save();

        $id = produk_tersertifikasi::select("luaran_id")->where('luaran_nama','=',$nama)->first();
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

        return redirect('/produktersertifikasi');
    }

}