<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('auth/login');
});
Route::get('/profile', function () {
  return view('profile');
});
Route::group(['middleware' => ['web', 'auth', 'roles']],function(){
  Route::group(['roles'=>'Resepsionis'],function(){
    Route::get('/disposisi', 'DisposisiController@resepsionis_list');
    Route::get('/disposisi/edit/{id}','DisposisiController@edit');
    Route::get('/disposisi/show/{id}','DisposisiController@show');
    Route::post('/disposisi/update','DisposisiController@update');
    Route::get('/create', 'DisposisiController@create');
    Route::get('/resepsionis/surat_masuk', 'SuratController@masuk_resepsionis');
    Route::get('/resepsionis/surat_keluar', 'SuratController@resepsionis_keluar');
    Route::get('/resepsionis/arsip', 'SuratController@resepsionis_show');
    Route::get('/resepsionis/arsip/cari', 'SuratController@resepsionis_cari');
    Route::post('/disposisi/proses', 'DisposisiController@create_resepsionis');
  });
  Route::group(['roles'=>'Sub. Bag. TU'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user', 'UserController@index');
    Route::get('/user/delete/{id}', 'UserController@destroy');
    Route::get('/user/tambah', 'UserController@tambah');
    Route::post('/user/tambah/create', 'UserController@create');
    Route::get('/disposisi2', 'DisposisiController@ketua_tu_list');
    Route::get('/disposisi2/edit2/{id}','DisposisiController@edit2');
    Route::get('/ketua_tu/surat_masuk', 'SuratController@masuk_ketua_tu');
    Route::get('/ketua_tu/arsip', 'SuratController@ketua_tu_show');
    Route::get('/ketua_tu/arsip/cari', 'SuratController@ketua_tu_cari');
    Route::post('/disposisi2/update2','DisposisiController@update2');
  });
  Route::get('/home_user', 'BrandaController@index');
  Route::get('/surat_masuk/list', 'SuratController@show');
  Route::get('/surat_masuk/cari', 'SuratController@cari');
  Route::get('/surat_masuk', 'SuratController@index');
  Route::get('/surat_keluar', 'SuratController@keluar');
  Route::get('/surat_keluar/create', 'SuratController@create_form');
  Route::get('/surat_keluar/edit/{id}', 'SuratController@edit');
  Route::get('/surat_keluar/show/{id}', 'SuratController@lihat');
  Route::post('/surat_keluar/update', 'SuratController@update');
  Route::get('/surat_masuk/baca/{id}', 'SuratController@create');
  Route::post('/surat_masuk/arsip', 'SuratController@store');
  Route::post('/surat_keluar/arsip', 'SuratController@arsipkan');
  Route::get('/surat_keluar/arsip/{id}', 'SuratController@tombol');
  Route::get('/surat_keluar/arsip2/{id}', 'SuratController@tombol2');
  Route::post('/surat_keluar/proses', 'SuratController@create_keluar');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
