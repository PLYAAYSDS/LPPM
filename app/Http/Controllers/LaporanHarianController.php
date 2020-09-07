<?php

namespace App\Http\Controllers;
use DB;
use App\kuesioner;
use Illuminate\Http\Request;

class LaporanHarianControler extends Controller
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

    public function SaveDailyReport($id){
        $base  = "../public/uploadLaporanHarian/";
        $file = $request->file('LaporanHarian');
        $path = $file->getClientOriginalName();
        $resp = $file->move('uploadLaporanHarian',$path);

        
        $jenis = $request->input('jenis');
        $judul = $request->input('judul');
        $bidang = $request->input('bidang');
        $tujuan = $request->input('tujuan');
        $dana = $request->input('dana');
        $ketua = $request->input('ketua');
        $jumlahmahasiswa = $request->input('jumlahmahasiswa');
        $luaran = $request->input('luaran');
        
        $data=array('jenis_penelitian'=>$jenis, 'judul'=>$judul, 'bidang_penelitian'=>$bidang, 'tujuan_sosial_ekonomi'=>$tujuan, 'jumlah_dana'=>$dana, 'ketua_peneliti'=>$ketua, 'jumlah_mahasiswa'=>$jumlahmahasiswa, 'luaran'=>$luaran, 'RAB'=>$baseRab.$pathRab, 'proposal'=>$basePro.$pathPro  );
        DB::table('penelitian')->insert($data);
    }

}