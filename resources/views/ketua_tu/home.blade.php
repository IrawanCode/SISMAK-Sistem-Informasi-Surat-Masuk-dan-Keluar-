@extends('/master/master')

@section('menu')

<ul class="list">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active">
    <a href="{{url('home_ketua_tu')}}">
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
@endsection

@section('judul_halaman', 'Resepsionis Home')

@section('konten')

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

@endsection
