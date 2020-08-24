@extends('/master/master')

@section('count', $count)

@section('display')
@foreach($disposisi as $D)
<?php if ($D->status==2): ?>
  <li style="list-style: none;">
      <a href="{{url('/disposisi/show/'.$D->id)}}">
          <div class="icon-circle bg-blue-grey">
              <i class="material-icons">comment</i>
          </div>
          <div class="menu-info">
              <h4>Data Milik {{$D->surat_dari}} Telah Berubah</h4>
              <p>
                  <i class="material-icons">access_time</i> Diperbaharui {{$D->updated_at}}
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

@section('menu')

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
