<?php

namespace App\Http\Controllers;
use App\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
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
        $dosen = Dosen::all();
        return response()->json($dosen);
        // return view('index',compact('dosen'));
    }
}