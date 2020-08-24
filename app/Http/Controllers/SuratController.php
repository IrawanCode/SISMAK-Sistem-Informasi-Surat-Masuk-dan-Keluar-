<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disposisi;
use App\Arsip;
use App\Surat;
use App\Auth;
use File;
class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
      $count = Disposisi::where('status',2)->orWhere('status',3)->count();
      $disposisi = Disposisi::where('status',2)->orWhere('status',3)->get();
      $all=Disposisi::all();
      return view('/user/surat',compact('disposisi', 'all'))->with('count', $count);
    }
    public function masuk_resepsionis()
    {
      $count = Disposisi::where('status',2)->count();
      $hitung = Disposisi::where('status',2)->count();
      $disposisi = Disposisi::where('status',2)->orWhere('status',3)->get();
      $all=Disposisi::all();
      return view('/resepsionis/masuk',compact('disposisi', 'all', 'hitung'))->with('count', $count);
    }
    public function masuk_ketua_tu()
    {
      $count = Disposisi::where('status',1)->count();
      $disposisi = Disposisi::where('status',1)->get();
      $all=Disposisi::all();
      return view('/ketua_tu/masuk',compact('disposisi', 'all'))->with('count', $count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
      $count = Disposisi::where('status',2)->orWhere('status',3)->count();
      $disposisi = Disposisi::where('status',2)->orWhere('status',3)->get();
      $show = Disposisi::where('id',$id)->get();
      return view('/user/baca', ['disposisi' => $show])->with('count', $count);
    }
    public function create_keluar(Request $request){
      $nomer=Surat::count();
      $this->validate($request,[
         'no_surat' => ['required'],
         'kepada' => ['required'],
         'perihal' => ['required'],
         'isi_surat' => ['required']
      ]);

      Surat::create([
        'no_surat' => $request->no_surat,
        'kepada' => $request->kepada,
        'perihal' => $request->perihal,
        'isi_surat' => $request->isi_surat,
        'dari'      => $request->dari
      ]);
       return redirect('/surat_keluar')->with('nomer', $nomer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Arsip::create([
          'surat_dari' => $request->surat_dari,
          'tgl_surat' => $request->tgl_surat,
          'tgl_terima' => $request->tgl_terima,
          'no_surat' => $request->no_surat,
          'no_agenda' => $request->no_agenda,
          'perihal' => $request->perihal,
          'kepada' => $request->kepada,
          'isi_disposisi' => $request->isi_disposisi,
          'diteruskan_kepada' => $request->diteruskan_kpd,
          'jenis_surat' => 'surat masuk',
          'milik'       => $request->milik
      ]);
      Disposisi::where('id',$request->id)->update([
        'status' => '4'
        ]);
       return redirect('/surat_masuk');
    }
    public function arsipkan(Request $request){
      Surat::where('id',$request->id)->update([
        'status' => '2'
        ]);

        Arsip::create([
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'kepada' => $request->kepada,
            'isi_surat' => $request->isi_surat,
            'jenis_surat' => 'surat keluar',
            'surat_dari'  => $request->surat_dari,
            'milik'  => $request->milik
        ]);
         return redirect('/surat_keluar');
    }
    public function tombol(Request $request){
      Surat::where('id',$request->id)->update([
        'status' => '2'
        ]);
        Arsip::create([
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'kepada' => $request->kepada,
            'isi_surat' => $request->isi_surat,
            'jenis_surat' => 'surat keluar',
            'surat_dari'  => $request->surat_dari
        ]);
        return redirect('/surat_keluar');
    }
    public function tombol2(Request $request){
      Surat::where('id',$request->id)->update([
        'status' => '0'
        ]);
        return redirect('/surat_keluar');
    }

    public function cari(Request $request){
      $dari = $request->dari;
      $sampai = $request->sampai;
      $jenis = $request->jenis;
      $count = Disposisi::where('status',2)->orWhere('status',3)->count();
      $disposisi = Disposisi::all();
      $arsip = Arsip::whereBetween('updated_at', [$dari, $sampai])->Where('jenis_surat', $jenis)->Where('milik', auth()->user()->role->role)->get();
      return view('user.arsip', compact('arsip', 'disposisi'))->with('count', $count);

    }
    public function resepsionis_cari(Request $request){
      $dari = $request->dari;
      $sampai = $request->sampai;
      $jenis = $request->jenis;
      $count = Disposisi::where('status',2)->count();
      $hitung = Disposisi::where('status',2)->count();
      $disposisi = Disposisi::all();
      $arsip = Arsip::whereBetween('updated_at', [$dari, $sampai])->Where('jenis_surat', $jenis)->get();
      return view('resepsionis.arsip', compact('arsip', 'disposisi', 'hitung'))->with('count', $count);

    }
    public function ketua_tu_cari(Request $request){
      $dari = $request->dari;
      $sampai = $request->sampai;
      $jenis = $request->jenis;
      $count = Disposisi::where('status',2)->count();
      $disposisi = Disposisi::all();
      $arsip = Arsip::whereBetween('updated_at', [$dari, $sampai])->Where('jenis_surat', $jenis)->get();
      return view('ketua_tu.arsip', compact('arsip', 'disposisi'))->with('count', $count);

    }
    public function lihat(Request $request, $id){
      $count = Disposisi::where('status',2)->orWhere('status',3)->count();
      $disposisi = Disposisi::all();
      $show = Surat::where('id',$id)->get();
      return view('/user/show', ['show' => $show], ['disposisi' => $disposisi])->with('count', $count);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $count = Disposisi::where('status',2)->orWhere('status',3)->count();
      $disposisi = Disposisi::all();
      $outs = Surat::where('status',2)->get();
      $arsip = Arsip::all();
      return view('user.arsip', compact('arsip', 'disposisi', 'outs'))->with('count', $count);
    }
    public function resepsionis_show(Request $request)
    {
      $count = Disposisi::where('status',2)->count();
      $hitung = Disposisi::where('status',2)->count();
      $disposisi = Disposisi::all();
      $outs = Surat::where('status',2)->get();
      $arsip = Arsip::where('milik', auth()->user()->role->role);
      return view('resepsionis.arsip', compact('arsip', 'disposisi', 'outs', 'hitung'))->with('count', $count);
    }
    public function ketua_tu_show(Request $request)
    {
      $count = Disposisi::where('status',2)->count();
      $disposisi = Disposisi::all();
      $outs = Surat::where('status',2)->get();
      $arsip = Arsip::all();
      return view('ketua_tu.arsip', compact('arsip', 'disposisi', 'outs'))->with('count', $count);
    }
    public function create_form(Request $request)
    {
      $nomer=Surat::count();
      $count = Disposisi::where('status',2)->orWhere('status',3)->count();
      $disposisi = Disposisi::all();
      $arsip = Arsip::all();
      return view('/user/create',['arsip' => $arsip], ['disposisi' => $disposisi])->with('count', $count)->with('nomer', $nomer);
    }
    public function keluar(Request $request){
      $count = Disposisi::where('status',2)->orWhere('status',3)->count();
      $disposisi = Disposisi::all();
      $keluar = Surat::all();
      return view('/user/keluar',['keluar' => $keluar], ['disposisi' => $disposisi])->with('count', $count);
    }
    public function resepsionis_keluar(Request $request){
      $count = Disposisi::where('status',2)->count();
      $hitung = Disposisi::where('status',2)->count();
      $disposisi = Disposisi::all();
      $keluar = Surat::all();
      return view('/resepsionis/keluar',compact('disposisi', 'keluar', 'hitung'))->with('count', $count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $count = Disposisi::where('status',2)->orWhere('status',3)->count();
      $disposisi = Disposisi::all();
      $keluar = Surat::all();
      $edit = Surat::where('id',$id)->get();
      return view('/user/edit',['keluar' => $edit], ['disposisi' => $disposisi])->with('count', $count);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
      $this->validate($request,[
        'no_surat' => ['required'],
        'kepada' => ['required'],
        'perihal' => ['required'],
        'isi_surat' => ['required']
      ]);
        Surat::where('id',$request->id)->update([
          'no_surat' => $request->no_surat,
          'kepada' => $request->kepada,
          'perihal' => $request->perihal,
          'isi_surat' => $request->isi_surat
        ]);
        return redirect('surat_keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
