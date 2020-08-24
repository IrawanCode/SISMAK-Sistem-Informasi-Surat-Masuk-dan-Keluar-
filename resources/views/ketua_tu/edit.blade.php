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

    <a href="s{{url('/ketua_tu/surat_masuk')}}">
        <i class="material-icons">move_to_inbox</i>
        <span>Surat Masuk</span>
    </a>
</li>
<li>
  <a href="{{url('user')}}">
    <i class="material-icons">account_box</i>
    <span>Pengguna</span>
  </a>
</li>
<li>
    <li class="active">
        <a href="disposisi2">
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

@section('judul_halaman', 'Mengedit Disposisi')

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
@foreach($disposisi as $D)
<form action="{{url('/disposisi2/update2')}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <a href="{{url('disposisi2')}}">
            <button type="button" class="btn btn-primary waves-effect">
              <i class="material-icons">backspace</i>
              <span>KEMBALI</span>
            </button>
          </a>
        </div>
        <div class="body">
          <form id="form_advanced_validation" method="POST">
            <input type="hidden" name="id" value="{{ $D->id }}">

            <div class="row clearfix">
                <div class="col-sm-12">
                  <label class="form-label">Kepada</label>
                    <select class="form-control show-tick" name="kepada">
                      @if($D->status=="1")
                        <option>
                            -- Please select --
                        </option>
                        @endif
                        @if($D->status=="2"||$D->status==3)
                          <option>
                              {{$D->kepada}}
                          </option>
                          @endif
                        <option value="Sub. Bag. TU">Ka. Sub. Bag. TU</option>
                        <option value="Sub. Bag. Kasie Produksi">Sub. Bag. Kasie Produksi</option>
                        <option value="Sub. Bag. Kasie Sosial">Sub. Bag. Kasie Sosial</option>
                        <option value="Sub. Bag. Kasie Distribusi">Sub. Bag. Kasie Distribusi</option>
                        <option value="Sub. Bag. Kasie Nerwilis">Sub. Bag. Kasie Nerwilis</option>
                        <option value="Sub. Bag. Kasie IPDS">Sub. Bag. Kasie IPDS</option>
                    </select>
                </div>
            </div>

            <div class="form-group form-float">
              <div class="form-line">
                <input type="text" class="form-control" name="isi_disposisi" value="{{$D->isi_disposisi}}">
                <label class="form-label">Isi Disposisi</label>
              </div>
              <div class="help-info"></div>
            </div>

            <div class="form-group form-float">
              <div class="form-line">
                <input type="text" class="form-control" name="diteruskan_kpd" value="{{$D->diteruskan_kpd}}">
                <label class="form-label">Diteruskan Kepada</label>
              </div>
              <div class="help-info"></div>
            </div>
            @if($D->status==1)
            <button class="btn btn-primary waves-effect" type="submit" value="Upload">Tambah</button>
            @endif
            @if($D->status==2||$D->status==3)
            <button class="btn btn-primary waves-effect" type="submit" value="Upload">update</button>
            @endif
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
