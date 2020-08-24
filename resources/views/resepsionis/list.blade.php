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

@section('judul_halaman', 'Disposisi')

@section('konten')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <a href="create">
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
                  <th>Surat Dari</th>
                  <th>Tanggal Surat</th>
                  <th>Tanggal Diterima</th>
                  <th>No Surat</th>
                  <th>No Agenda</th>
                  <th>Perihal</th>
                  <th style="width: 130px;">Action</th>
                </tr>
              </thead>
              <?php $no=0; ?>
              <tbody>
                 @foreach($disposisi as $D)
                 @section('nama')
                 {{$D->surat_dari}}
                 @endsection
                 @section('time')
                 {{$D->updated_at}}
                 @endsection
                 <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$D->surat_dari}}</td>
                  <td>{{$D->tgl_surat}}</td>
                  <td>{{$D->tgl_terima}}</td>
                  <td>{{$D->no_surat}}</td>
                  <td>{{$D->no_agenda}}</td>
                  <td>{{$D->perihal}}</td>
                  <td>
                    @if($D->status=="1")
                    <div class="icon-button-demo">
                      <a href="{{url('/disposisi/edit/'.$D->id)}}" style="color: white; padding-left: 10px;">
                       <button type="button" class="btn bg-deep-purple btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">settings</i>
                      </button>
                    </a>
                    @endif
                    @if($D->status==2||$D->status==3)
                    <div class="icon-button-demo">
                      <a href="{{url('/disposisi/edit/'.$D->id)}}" style="color: white; padding-left: 10px;">
                        <button type="button" class="btn bg-deep-purple btn-circle waves-effect waves-circle waves-float">
                          <i class="material-icons">settings</i>
                        </button>
                      </a>
                      <a href="{{url('/disposisi/show/'.$D->id)}}" style="padding-left: 5px;">
                        <button type="button" class="btn bg-purple btn-circle waves-effect waves-circle waves-float">
                          <i class="material-icons">search</i>
                        </button>
                      </a>
                      @endif
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
