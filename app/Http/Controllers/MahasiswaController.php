<?php

namespace App\Http\Controllers;
use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
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
        // $mahasiswa = Mahasiswa::select('nama')->get();
        $mahasiswa = Mahasiswa::all();
        return response()->json($mahasiswa);
        // return view('index',compact('dosen'));
    }
}