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
  <a href="{{url('user')}}">
    <i class="material-icons">account_box</i>
    <span>Pengguna</span>
</a>
</li>
<li>
    <li class="active">
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
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Surat Dari</th>
                  <th>Tanggal Surat</th>
                  <th>Tanggal Diterima</th>
                  <th>No Surat</th>
                  <th>No Agenda</th>
                  <th>Perihal</th>
                  <th>Kepada</th>
                  <th>Isi Disposisi</th>
                  <th>Diteruskan Kepada</th>
                  <th style="width: 50px;">Action</th>
                </tr>
              </thead>
              <?php $no=0; ?>
              <tbody>
                 @foreach($disposisi as $D)
                 <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$D->surat_dari}}</td>
                  <td>{{$D->tgl_surat}}</td>
                  <td>{{$D->tgl_terima}}</td>
                  <td>{{$D->no_surat}}</td>
                  <td>{{$D->no_agenda}}</td>
                  <td>{{$D->perihal}}</td>
                  <td>{{$D->kepada}}</td>
                  <td>{{$D->isi_disposisi}}</td>
                  <td>{{$D->diteruskan_kpd}}</td>
                  <td>
                    <div class="icon-button-demo">
                      <a href="{{url('/disposisi2/edit2/'.$D->id)}}" style="color: white;">
                       <button type="button" class="btn bg-deep-purple btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">settings</i>
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
