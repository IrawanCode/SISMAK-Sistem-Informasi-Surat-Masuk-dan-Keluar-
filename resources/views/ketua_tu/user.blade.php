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

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <a href="{{url('/user/tambah')}}">
            <button type="button" class="btn btn-primary waves-effect">
              <i class="material-icons">note_add</i>
              <span>Tambah Baru</span>
            </button>
          </a>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>NIP</th>
                  <th>Username</th>
                  <th style="width: 50px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;?>
                 @foreach($user as $D)
                 <?php $no++ ;?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$D->name}}</td>
                  <td>{{$D->role->role}}</td>
                  <td>{{$D->nip}}</td>
                  <td>{{$D->email}}</td>
                  <td>
                    <div class="icon-button-demo">
                      <a href="{{url('/user/delete/'.$D->id)}}" style="color: white;">
                       <button type="button" class="btn bg-deep-purple btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                      </button>
                    </a>
                  </div>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
