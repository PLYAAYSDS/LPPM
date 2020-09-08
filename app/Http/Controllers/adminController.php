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

        $role = auth()->user()->role;
        if($role == 1){ 
            return redirect('/penelitianhomelppm');
        }else if($role == 2){
            return redirect('/penelitianhomedekan');
        }else if($role == 3){
            return redirect('/penelitianhomekaprodi');
        }else if($role == 4){
            return redirect('/penelitian');
        }
    }

    public function logout()
    {
    	\Auth::logout();

    	return redirect('login');
    }
}
