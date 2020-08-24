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

    <a href="{{url('/ketua_tu/surat_masuk')}}">
        <i class="material-icons">move_to_inbox</i>
        <span>Surat Masuk</span>
    </a>
</li>
<li>
  <li class="active">
  <a href="{{url('user')}}">
    <i class="material-icons">account_box</i>
    <span>Pengguna</span>
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

@section('judul_halaman', 'Disposisi')

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

<form action="{{url('/user/tambah/create')}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <a href="{{url('user')}}">
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
                <input type="text" class="form-control" name="name" min="10" max="200">
                <label class="form-label">Nama Lengkap</label>
              </div>
              <div class="help-info"></div>
            </div>

            <div class="row clearfix">
                <div class="col-sm-12">
                  <label class="form-label">Jabatan</label>
                    <select class="form-control show-tick" name="role_id">
                        <option>-- Please select --</option>
                        <option value="1">Ketua BPS</option>
                        <option value="2">Sub. Bag. TU</option>
                        <option value="3">Sub. Bag. Kasie Produksi</option>
                        <option value="4">Sub. Bag. Kasie Sosial</option>
                        <option value="5">Sub. Bag. Kasie Distribusi</option>
                        <option value="6">Sub. Bag. Kasie Nerwilis</option>
                        <option value="7">Sub. Bag. Kasie IPDS</option>
                        <option value="8">Resepsionis</option>
                    </select>
                </div>
            </div>

            <div class="form-group form-float">
              <div class="form-line">
                <input type="text" class="form-control" name="nip" min="10" max="200">
                <label class="form-label">NIP</label>
              </div>
              <div class="help-info"></div>
            </div>

            <div class="form-group form-float">
              <div class="form-line">
                <input type="text" class="form-control" name="email" min="10" max="200">
                <label class="form-label">Username</label>
              </div>
              <div class="help-info"></div>
            </div>

            <button class="btn btn-primary waves-effect" type="submit" value="Upload">create</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection
