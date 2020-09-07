<?php

namespace App\Http\Controllers;
use App\luaran_iptek;
use App\Mahasiswa;
use App\Pegawai;
use App\lppm_luaran_anggota_dosen;
use App\lppm_luaran_anggota_mahasiswa;
use App\lppm_luaran_anggota_pegawai;
use Illuminate\Http\Request;
use Validator;

class LuaranIptekController extends Controller
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

        return view("luaranIptek.create",compact('mahasiswa','dosen','pegawai'));
    }

    public function create(Request $request){

        $baseLuaran  = "../public/uploadLuaran/";
        $fileLuaran = $request->file('Luaran');
        $pathLuaran = $fileLuaran->getClientOriginalName();
        $respLuaran = $fileLuaran->move('uploadLuaran',$pathLuaran);

       $luaran_iptek = new luaran_iptek();
        $dosen = auth()->user()->id;
        $nama = $request->input('luaran_nama');
        $luaran_iptek->luaran_tipe = "Luaran iptek";
        $luaran_iptek->status_id = 17;   
        $luaran_iptek->dosen_id = $dosen;     
        $luaran_iptek->luaran_tahun = $request->input('luaran_tahun');
        $luaran_iptek->luaran_jenis = $request->input('luaran_jenis');
        $luaran_iptek->luaran_nama = $request->input('luaran_nama');
        $luaran_iptek->luaran_deskripsi = $request->input('luaran_deskripsi');
        $luaran_iptek->luaran_file = $pathLuaran;
        $luaran_iptek->save();

        $id = luaran_iptek::select("luaran_id")->where('luaran_nama','=',$nama)->first();
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
        

        return redirect('/luaraniptek');
    }

}