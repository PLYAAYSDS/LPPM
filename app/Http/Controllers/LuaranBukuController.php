<?php

namespace App\Http\Controllers;
use App\luaran_buku;
use App\Mahasiswa;
use App\Pegawai;
use App\lppm_luaran_anggota_dosen;
use App\lppm_luaran_anggota_mahasiswa;
use App\lppm_luaran_anggota_pegawai;
use Illuminate\Http\Request;
use Validator;

class LuaranBukuController extends Controller
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

        return view("luaranBuku.create",compact('mahasiswa','dosen','pegawai'));
    }

    public function create(Request $request){

        $baseLuaran  = "../public/uploadLuaran/";
        $fileLuaran = $request->file('Luaran');
        $pathLuaran = $fileLuaran->getClientOriginalName();
        $respLuaran = $fileLuaran->move('uploadLuaran',$pathLuaran);

        $luaran_buku = new luaran_buku();
        $dosen = auth()->user()->id;

        $nama = $request->input('luaran_nama');
        $luaran_buku->luaran_tipe = "Buku";
        $luaran_buku->status_id = 17;
        $luaran_buku->dosen_id = $dosen;
        $luaran_buku->luaran_tahun = $request->input('luaran_tahun');
        $luaran_buku->luaran_jenis = $request->input('luaran_jenis');
        $luaran_buku->luaran_nama = $request->input('luaran_nama');
        $luaran_buku->luaran_isbn = $request->input('luaran_isbn');
        $luaran_buku->luaran_jumlah_halaman = $request->input('luaran_jumlah_halaman');
        $luaran_buku->luaran_penerbit = $request->input('luaran_penerbit');
        $luaran_buku->luaran_file = $pathLuaran;
        $luaran_buku->save();


        $id = luaran_buku::select("luaran_id")->where('luaran_nama','=',$nama)->first();
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

        return redirect('/luaranbuku');
    }

}