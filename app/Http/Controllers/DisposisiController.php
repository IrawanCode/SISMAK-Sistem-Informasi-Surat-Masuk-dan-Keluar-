<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disposisi;
use File;
class DisposisiController extends Controller
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

    public function resepsionis_list()
    {
        $count = Disposisi::where('status',2)->count();
        $hitung = Disposisi::where('status',2)->count();
        $disposisi = Disposisi::all();
        $notif = Disposisi::where('status',2)->get();
        return view('/resepsionis/list', compact('count', 'hitung', 'disposisi', 'notif'))->with('count', $count);
    }
    public function ketua_tu_list()
    {
        $count = Disposisi::where('status',1)->count();
        $disposisi = Disposisi::all();
        return view('/ketua_tu/list',['disposisi' => $disposisi])->with('count', $count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_resepsionis(Request $request)
    {
        $this->validate($request,[
           'surat_dari' => ['required','min:5','max:20'],
           'tgl_surat' => ['required'],
           'tgl_terima' => ['required'],
           'no_surat' => ['required'],
           'no_agenda' => ['required'],
           'perihal' => ['required']
        ]);

        Disposisi::create([
            'surat_dari' => $request->surat_dari,
            'tgl_surat' => $request->tgl_surat,
            'tgl_terima' => $request->tgl_terima,
            'no_surat' => $request->no_surat,
            'no_agenda' => $request->no_agenda,
            'perihal' => $request->perihal,
            'status' => '1'
        ]);
         return redirect('disposisi');
    }
    public function create(){
      $count = Disposisi::where('status',2)->count();
      $hitung = Disposisi::where('status',2)->count();
      $disposisi = Disposisi::where('aktor','resepsionis')->get();
      return view('resepsionis/create',['disposisi' => $disposisi], ['hitung'=>$hitung])->with('count', $count);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
      $count = Disposisi::where('status',2)->count();
      $hitung = Disposisi::where('status',2)->count();
      $disposisi = Disposisi::where('aktor','resepsionis')->get();
      $show = Disposisi::where('id',$id)->get();
      Disposisi::where('id',$request->id)->update([
        'status' => '3'
        ]);
      return view('/resepsionis/show', ['disposisi' => $show], ['hitung'=>$hitung])->with('count', $count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $count = Disposisi::where('status',2)->count();
      $hitung = Disposisi::where('status',2)->count();
      $disposisi = Disposisi::where('aktor','resepsionis')->get();
      $edit = Disposisi::where('id',$id)->get();
      return view('/resepsionis/edit', ['disposisi' => $edit], ['hitung'=>$hitung])->with('count', $count);

    }
    public function edit2($id)
    {
      $count = Disposisi::where('status',1)->count();
      $disposisi = Disposisi::where('status',1)->get();
      $edit = Disposisi::where('id',$id)->get();
      return view('/ketua_tu/edit', ['disposisi' => $edit])->with('count', $count);

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
         'surat_dari' => ['required','min:5','max:20'],
         'tgl_surat' => ['required'],
         'tgl_terima' => ['required'],
         'no_surat' => ['required'],
         'no_agenda' => ['required'],
         'perihal' => ['required']
      ]);
        Disposisi::where('id',$request->id)->update([
            'surat_dari' => $request->surat_dari,
            'tgl_surat' => $request->tgl_surat,
            'tgl_terima' => $request->tgl_terima,
            'no_surat' => $request->no_surat,
            'no_agenda' => $request->no_agenda,
            'perihal' => $request->perihal,
        ]);
        return redirect('disposisi');
    }
    public function update2(Request $request)
    {
      $this->validate($request,[
        'kepada' => ['required'],
        'isi_disposisi' => ['required'],
        'diteruskan_kpd' => ['required'],
      ]);
      Disposisi::where('id',$request->id)->update([
        'kepada' => $request->kepada,
        'isi_disposisi' => $request->isi_disposisi,
        'diteruskan_kpd' => $request->diteruskan_kpd,
        'status' => '2'
        ]);
        return redirect('disposisi2');
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
