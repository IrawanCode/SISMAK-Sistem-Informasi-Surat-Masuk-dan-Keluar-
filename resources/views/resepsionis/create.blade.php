@extends('/master/master')

@section('menu')

<ul class="list">
    <li class="header">MAIN NAVIGATION</li>
    <a href="{{url('home')}}">
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
  <li class="active">
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

@section('judul_halaman', 'Disposisi Baru')

@section('konten')

@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{url('/disposisi/proses')}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <a href="disposisi">
            <button type="button" class="btn btn-primary waves-effect">
              <i class="material-icons">backspace</i>
              <span>KEMBALI</span>
            </button>
          </a>
        </div>
        <div class="body">
          <form id="form_advanced_validation" method="POST">

            <div class="form-group form-float">
              <div class="form-line">
                <input type="text" class="form-control" name="surat_dari" min="10" max="200">
                <label class="form-label">Surat Dari</label>
              </div>
              <div class="help-info">Minimal 5 karakter</div>
            </div>

            <div class="form-group form-float">
              <div class="form-line">
                <input type="text" class="form-control" name="no_surat" min="10" max="200">
                <label class="form-label">No Surat</label>
              </div>
              <div class="help-info">Min. 3, Max. 10 characters</div>
            </div>

            <div class="form-group form-float">
              <div class="form-line">
                <input type="text" class="form-control" name="no_agenda" min="10" max="200">
                <label class="form-label">No Agenda</label>
              </div>
              <div class="help-info">Min. 3, Max. 10 characters</div>
            </div>

            <div class="form-group form-float">
              <div class="form-line">
                <input type="date" class="form-control" name="tgl_surat" value="2020-01-01">
                <label class="form-label">Tanggal Surat</label>
              </div>
              <div class="help-info">Tanggal Surat</div>
            </div>

            <div class="form-group form-float">
              <div class="form-line">
                <input type="date" class="form-control" name="tgl_terima" value="2020-01-01">
                <label class="form-label">Tanggal Terima</label>
              </div>
              <div class="help-info">Tanggal Diterima</div>
            </div>

            <div class="form-group form-float">
              <div class="form-line">
                <input type="text" class="form-control" name="perihal">
                <label class="form-label">Perihal</label>
              </div>
              <div class="help-info">Hanya bisa menggunakan huruf</div>
            </div>

            <button class="btn btn-primary waves-effect" type="submit" value="Upload">Tambah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
