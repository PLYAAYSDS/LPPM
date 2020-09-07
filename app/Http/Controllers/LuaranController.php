<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\luaran;
use DB;

class LuaranController extends Controller
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

    //
    public function index()
    {
        $dosen = auth()->user()->id;
        $luaran = luaran::where('dosen_id',$dosen)->get();
        // $luaran = DB::table('lppm_luaran');            
        return view('luaran',compact('luaran'));
    }

    public function lihatDetail($id)
    {
        $luaran = luaran::where('luaran_id',$id)->first();

        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_luaran_anggota_mahasiswa
        ON lppm.lppm_luaran_anggota_mahasiswa.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_luaran_anggota_mahasiswa.luaran_id ='.$id);

        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_pegawai
        ON lppm.lppm_luaran_anggota_pegawai.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_pegawai.luaran_id ='.$id);

        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_dosen
        ON lppm.lppm_luaran_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_dosen.luaran_id = '.$id);

        return view('luaranjurnal',compact('luaran','mahasiswa','staff','anggotaDosen'));
        
    }

    public function lihatDetailMediaMassa($id)
    {

        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_luaran_anggota_mahasiswa
        ON lppm.lppm_luaran_anggota_mahasiswa.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_luaran_anggota_mahasiswa.luaran_id ='.$id);

        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_pegawai
        ON lppm.lppm_luaran_anggota_pegawai.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_pegawai.luaran_id ='.$id);

        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_dosen
        ON lppm.lppm_luaran_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_dosen.luaran_id = '.$id);

        $luaran = luaran::where('luaran_id',$id)->first();

        return view('luaranmediamassa',compact('luaran','mahasiswa','staff','anggotaDosen'));
        
    }

    public function lihatDetailForumIlmiah($id)
    {
        $luaran = luaran::where('luaran_id',$id)->first();

        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_luaran_anggota_mahasiswa
        ON lppm.lppm_luaran_anggota_mahasiswa.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_luaran_anggota_mahasiswa.luaran_id ='.$id);

        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_pegawai
        ON lppm.lppm_luaran_anggota_pegawai.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_pegawai.luaran_id ='.$id);

        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_dosen
        ON lppm.lppm_luaran_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_dosen.luaran_id = '.$id);

        return view('luaranforumilmiah',compact('luaran','mahasiswa','staff','anggotaDosen'));
        
    }

    public function lihatDetailHakKekayaanInternasional($id)
    {
        $luaran = luaran::where('luaran_id',$id)->first();

        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_luaran_anggota_mahasiswa
        ON lppm.lppm_luaran_anggota_mahasiswa.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_luaran_anggota_mahasiswa.luaran_id ='.$id);

        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_pegawai
        ON lppm.lppm_luaran_anggota_pegawai.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_pegawai.luaran_id ='.$id);

        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_dosen
        ON lppm.lppm_luaran_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_dosen.luaran_id = '.$id);

        return view('luaranhakkekayaaninternasional',compact('luaran','mahasiswa','staff','anggotaDosen'));
        
    }

    public function lihatDetailLuaranIptek($id)
    {
        $luaran = luaran::where('luaran_id',$id)->first();

        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_luaran_anggota_mahasiswa
        ON lppm.lppm_luaran_anggota_mahasiswa.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_luaran_anggota_mahasiswa.luaran_id ='.$id);

        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_pegawai
        ON lppm.lppm_luaran_anggota_pegawai.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_pegawai.luaran_id ='.$id);

        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_dosen
        ON lppm.lppm_luaran_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_dosen.luaran_id = '.$id);

        return view('luaraniptek',compact('luaran','mahasiswa','staff','anggotaDosen'));
        
    }

    public function lihatDetailProdukTerstandarisasi($id)
    {
        $luaran = luaran::where('luaran_id',$id)->first();

        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_luaran_anggota_mahasiswa
        ON lppm.lppm_luaran_anggota_mahasiswa.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_luaran_anggota_mahasiswa.luaran_id ='.$id);

        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_pegawai
        ON lppm.lppm_luaran_anggota_pegawai.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_pegawai.luaran_id ='.$id);

        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_dosen
        ON lppm.lppm_luaran_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_dosen.luaran_id = '.$id);

        return view('luaranprodukterstandarisasi',compact('luaran','mahasiswa','staff','anggotaDosen'));
        
    }

    public function lihatDetailProdukTersertifikasi($id)
    {
        $luaran = luaran::where('luaran_id',$id)->first();

        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_luaran_anggota_mahasiswa
        ON lppm.lppm_luaran_anggota_mahasiswa.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_luaran_anggota_mahasiswa.luaran_id ='.$id);

        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_pegawai
        ON lppm.lppm_luaran_anggota_pegawai.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_pegawai.luaran_id ='.$id);

        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_dosen
        ON lppm.lppm_luaran_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_dosen.luaran_id = '.$id);

        return view('luaranproduktersertifikasi',compact('luaran','mahasiswa','staff','anggotaDosen'));
        
    }

    public function lihatDetailMitraHukum($id)
    {
        $luaran = luaran::where('luaran_id',$id)->first();

        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_luaran_anggota_mahasiswa
        ON lppm.lppm_luaran_anggota_mahasiswa.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_luaran_anggota_mahasiswa.luaran_id ='.$id);

        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_pegawai
        ON lppm.lppm_luaran_anggota_pegawai.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_pegawai.luaran_id ='.$id);

        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_dosen
        ON lppm.lppm_luaran_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_dosen.luaran_id = '.$id);

        return view('luaranmitrahukum',compact('luaran','mahasiswa','staff','anggotaDosen'));
        
    }

    public function lihatDetailBuku($id)
    {
        $luaran = luaran::where('luaran_id',$id)->first();
        

        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_luaran_anggota_mahasiswa
        ON lppm.lppm_luaran_anggota_mahasiswa.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_luaran_anggota_mahasiswa.luaran_id ='.$id);

        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_pegawai
        ON lppm.lppm_luaran_anggota_pegawai.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_pegawai.luaran_id ='.$id);

        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_luaran_anggota_dosen
        ON lppm.lppm_luaran_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_luaran_anggota_dosen.luaran_id = '.$id);

        return view('luaranbuku',compact('luaran','mahasiswa','staff','anggotaDosen'));
        
    }

    public function terima($id){

        $luaran = luaran::where('luaran_id', $id)->first();
        $luaran->status_id = 18;
        $luaran->save();

        return redirect()->back();

    }

    public function tolak($id){

        $luaran = luaran::where('luaran_id', $id)->first();
        $luaran->status_id = 19;
        $luaran->save();

        return redirect()->back();

    }
}
