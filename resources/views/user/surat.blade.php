@extends('/master/master')

@section('count', $count)

@section('display')
@foreach($disposisi as $D)
<?php if ($D->status==2||$D->status==3): ?>
  <li style="list-style: none;">
      <a href="{{url('/disposisi/show/'.$D->id)}}">
          <div class="icon-circle bg-blue-grey">
              <i class="material-icons">comment</i>
          </div>
          <div class="menu-info">
              <h4>Surat Baru Dari {{$D->surat_dari}}</h4>
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
    <a href="{{url('home')}}">
        <i class="material-icons">home</i>
        <span>Home</span>
    </a>
</li>
<li>
    <li class="active">
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
@endsection

@section('judul_halaman', 'USER')

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
                  <th style="width: 50px;">Status</th>
                </tr>
              </thead>
              <?php $no=0; ?>
              <tbody>
                 @foreach($all as $D)
                 <?php $no++; ?>
                 @if($D->kepada==auth()->user()->role->role)
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
                      <a href="{{url('/surat_masuk/baca/'.$D->id)}}">
                        <button type="button" class="btn bg-deep-purple btn-circle waves-effect waves-circle waves-float">
                          <i class="material-icons">message</i>
                        </button>
                      </a>
                    </div>
                  </td>
                  <td>
                    <?php if ($D->status==3): ?>
                      Belum Diarsipkan
                    <?php endif; ?>
                    <?php if ($D->status==4): ?>
                      Telah Diarsipkan
                    <?php endif; ?>
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
