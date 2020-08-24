<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disposisi;
use App\Arsip;
use File;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $count = Disposisi::where('status',1)->count();
      $hitung = Disposisi::where('status',2)->count();
      $masuk = Arsip::where('jenis_surat', "surat masuk")->where('kepada', auth()->user()->role->role)->count();
      $keluar = Arsip::where('jenis_surat', "surat keluar")->where('kepada', auth()->user()->role->role)->count();
      $dis= Disposisi::all()->where('kepada', auth()->user()->role->role)->count();
      $arsip= Arsip::all()->where('dari', auth()->user()->role->role)->count();
      $disposisi = Disposisi::all();
      return view('home', compact('disposisi', 'masuk', 'keluar', 'dis', 'arsip', 'hitung'))->with('count', $count);
      // return view('home');
    }
}
