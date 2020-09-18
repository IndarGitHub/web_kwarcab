<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = \App\Models\Berita::get();
        $berita_user = \App\Models\Berita::where('user_id',Auth::user()->id)->get();
        $kegiatan = \App\Models\Kegiatan::get();
        $pendaftaran = \App\Models\Pendaftaran::get();
        $download = \App\Models\Download::get();
        return view('home')->with(compact('berita','kegiatan','pendaftaran','download','berita_user'));
    }
}
