<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\User;
use\App\Disposisi;
use\File;

class UserController extends Controller
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
        $count = Disposisi::where('status',1)->count();
        $user = User::all();
        $disposisi = Disposisi::all();
        return view('ketua_tu.user', compact('user', 'disposisi'))->with('count', $count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah(){
      $acak = User::all()->count();
      $count = Disposisi::where('status',1)->count();
      $user = User::all();
      $disposisi = Disposisi::all();
      return view('/ketua_tu/create', compact('count', 'disposisi', 'acak'))->with('count', $count);
    }
    public function create(Request $request)
    {
        $this->validate($request,[
          'name'    => ['required'],
          'role_id' => ['required'],
          'nip'     => ['required'],
          'email'   => ['required'],
        ]);
        User::create([
          'name'    => $request->name,
          'role_id' => $request->role_id,
          'nip'     => $request->nip,
          'email'   => $request->email,
          'foto'    => 'default.jpg'
        ]);
        return redirect('user');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::where('id',$id)->delete();
      return redirect('user');
    }
}
