@extends('/master/master')
@section('count', $count)
@section('display')
@foreach($disposisi as $D)
<?php if ($D->status==1): ?>
  <li style="list-style: none;">
      <a href="javascript:void(0);">
          <div class="icon-circle bg-blue-grey">
              <i class="material-icons">comment</i>
          </div>
          <div class="menu-info">
              <h4>{{$D->surat_dari}}(new)</h4>
              <p>
                  <i class="material-icons">access_time</i>{{$D->updated_at}}
              </p>
          </div>
      </a>
  </li>
<?php endif; ?>
@endforeach
<?php if ($count==0): ?>
  <li style="list-style: none;">
          <div style="text-align: center;">
              <h5>Tidak Ada Notifikasi</h5>
          </div>
  </li>
<?php endif; ?>
@endsection

@section('judul_halaman', 'Home')
@section('menu')
@if (auth()->user()->role->role == "Sub. Bag. TU")
<ul class="list">
  <li class="header">MAIN NAVIGATION</li>
  <li class="active">
    <a href="{{url('home')}}">
      <i class="material-icons">home</i>
      <span>Home</span>
    </a>
  </li>
  <li>

    <a href="{{url('/ketua_tu/surat_masuk')}}">
      <i class="material-icons">move_to_inbox</i>
      <span>Surat Masuk</span>
    </a>
  </li>
  <li>
    <a href="{{url('user')}}">
      <i class="material-icons">account_box</i>
      <span>Pengguna</span>
    </a>
  </a>
</li>
<li>

  <a href="{{url('disposisi2')}}">
    <i class="material-icons">class</i>
    <span>Disposisi</span>
  </a>
</li>
<li>

  <a href="{{url('/ketua_tu/arsip')}}">
    <i class="material-icons">library_books</i>
    <span>Arsip</span>
  </a>
</li>
</ul>
@endif
@if (auth()->user()->role->role == "Resepsionis")
<ul class="list">
  <li class="header">MAIN NAVIGATION</li>
  <li class="active">
    <a href="{{url('home_resepsionis')}}">
      <i class="material-icons">home</i>
      <span>Home</span>
    </a>
  </li>
  <li>
    <a href="{{url('/resepsionis/surat_masuk')}}">
      <i class="material-icons">move_to_inbox</i>
      <span>Surat Masuk</span>
    </a>
  </li>
  <li>
    <a href="{{url('/resepsionis/surat_keluar')}}">
      <i class="material-icons">unarchive</i>
      <span>Surat Keluar</span>
    </a>
  </li>
  <li>
    <a href="{{url('disposisi')}}">
      <i class="material-icons">class</i>
      <span>Disposisi</span>
    </a>
  </li>
  <li>
    <a href="{{url('/resepsionis/arsip')}}">
      <i class="material-icons">library_books</i>
      <span>Arsip</span>
    </a>
  </li>
</ul>
@endif
@if (auth()->user()->role->role == "Ketua BPS"||auth()->user()->role->role == "Sub. Bag. Kasie. Produksi"
||auth()->user()->role->role == "Sub. Bag. Kasie. Sosial"||auth()->user()->role->role == "Sub. Bag. Kasie. Distribusi"
||auth()->user()->role->role == "Sub. Bag. Kasie. Nerwilis"||auth()->user()->role->role == "Sub. Bag. Kasie. IPDS")
<ul class="list">
  <li class="header">MAIN NAVIGATION</li>
  <li class="active">
    <a href="{{url('home_user')}}">
      <i class="material-icons">home</i>
      <span>Home</span>
    </a>
  </li>
  <li>

    <a href="{{url('surat_masuk')}}">
      <i class="material-icons">move_to_inbox</i>
      <span>Surat Masuk</span>
    </a>
  </li>
  <li>

    <a href="{{url('/surat_keluar')}}">
      <i class="material-icons">unarchive</i>
      <span>Surat Keluar</span>
    </a>
  </li>
  <li>

    <a href="{{url('/surat_masuk/list')}}">
      <i class="material-icons">library_books</i>
      <span>Arsip</span>
    </a>
  </li>
</ul>
@endif
@endsection
@section('konten')
@if (auth()->user()->role->role == "Resepsionis"||auth()->user()->role->role == "Sub. Bag. TU")
<div class="row clearfix">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-pink hover-expand-effect">
      <div class="icon">
        <i class="material-icons">move_to_inbox</i>
      </div>
      <div class="content">
        <div class="text">Surat Masuk</div>
        <div class="number count-to" data-from="0" data-to="{{($masuk)}}" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
      <div class="icon">
        <i class="material-icons">unarchive</i>
      </div>
      <div class="content">
        <div class="text">Surat Keluar</div>
        <div class="number count-to" data-from="0" data-to="{{($keluar)}}" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-light-green hover-expand-effect">
      <div class="icon">
        <i class="material-icons">class</i>
      </div>
      <div class="content">
        <div class="text">DISPOSISI</div>
        <div class="number count-to" data-from="0" data-to="{{($dis)}}" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
      <div class="icon">
        <i class="material-icons">library_books</i>
      </div>
      <div class="content">
        <div class="text">Arsip</div>
        <div class="number count-to" data-from="0" data-to="{{($arsip)}}" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
</div>
@endif
@if (auth()->user()->role->role == "Ketua BPS"||auth()->user()->role->role == "Sub. Bag. Kasie. Produksi"
||auth()->user()->role->role == "Sub. Bag. Kasie. Sosial"||auth()->user()->role->role == "Sub. Bag. Kasie. Distribusi"
||auth()->user()->role->role == "Sub. Bag. Kasie. Nerwilis"||auth()->user()->role->role == "Sub. Bag. Kasie. IPDS")
<div class="row clearfix">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-pink hover-expand-effect">
      <div class="icon">
        <i class="material-icons">move_to_inbox</i>
      </div>
      <div class="content">
        <div class="text">Surat Masuk</div>
        <div class="number count-to" data-from="0" data-to="{{($masuk)}}" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
      <div class="icon">
        <i class="material-icons">unarchive</i>
      </div>
      <div class="content">
        <div class="text">Surat Keluar</div>
        <div class="number count-to" data-from="0" data-to="{{($keluar)}}" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
      <div class="icon">
        <i class="material-icons">library_books</i>
      </div>
      <div class="content">
        <div class="text">Arsip</div>
        <div class="number count-to" data-from="0" data-to="{{($arsip)}}" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
