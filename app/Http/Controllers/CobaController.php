<?php

namespace App\Http\Controllers;

class CobaController extends Controller
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
    public function dashboard()
    {
        return view('dosen.index');
    }
}
