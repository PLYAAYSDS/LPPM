<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use App\pembeli;
use App\toko;
use App\detailtransaksi;
use App\kategori;
use DB;
use Illuminate\Support\Collection;

class adminController extends Controller
{
    public function dashboard(){

        $produk = DB::table('produk')->join('toko', function($join)
        {
            $join->on('produk.id_toko','=','toko.id');
            
        })
        ->where('toko.status_toko','=','2')
        ->get();
        $jumlah_produk = count($produk);
        
        $toko = toko::where(DB::raw("status_toko"),('2'))->get();
        $jumlah_toko = count($toko);

        $pembeli = pembeli::where(DB::raw("role"),('2'))->get();
        $jumlah_pembeli = count($pembeli);

        
        $chart_penjualan = transaksi::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');

            //ini udah benar
                // $stok_produk = DB::table('detailtransaksi')
                //     ->select(DB::raw('SUM(detailtransaksi.jumlah) AS total_terjual'))
                //     ->join('produk','detailtransaksi.id_product','=','produk.id')
                //     ->join('kategori','produk.kategori','=','kategori.id')
                //     ->groupBy('detailtransaksi.id_product')
                //     ->pluck('total_terjual');
                
                    $stok_produk = DB::table('detailtransaksi')
                    ->select(DB::raw('SUM(detailtransaksi.jumlah) AS total_terjual'))
                    ->join('produk','detailtransaksi.id_product','=','produk.id')
                    ->join('kategori','produk.kategori','=','kategori.id')
                    ->where('detailtransaksi.status_pengiriman','=','4')
                    ->groupBy('kategori.id')
                    ->pluck('total_terjual');    

                    $total_terjual = array_map('intval', json_decode($stok_produk));

                $kategori = kategori::all();
                $listkategori = [];
                $data = [];
                foreach ($kategori as $kategori ) {
                    $listkategori[] = $kategori->nama; 
                }
                // dd(json_encode($stok_produk));

        return view('dashboard',compact('jumlah_produk','jumlah_toko','jumlah_pembeli','chart_penjualan','listkategori','total_terjual'));
    }

    public function logout()
    {
    	\Auth::logout();

    	return redirect('login');
    }
}
