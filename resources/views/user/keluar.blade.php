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

    <a href="{{url('surat_masuk')}}">
        <i class="material-icons">move_to_inbox</i>
        <span>Surat Masuk</span>
    </a>
</li>
<li>
    <li class="active">
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
          <a href="surat_keluar/create">
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
                  <th style="width: 20px; text-align:center;">#</th>
                  <th style="width: 230px; text-align:center;">No Surat</th>
                  <th style="text-align:center;">Kepada</th>
                  <th style="text-align:center;">Perihal</th>
                  <th style="width: 200px; text-align:center;">Isi Surat</th>
                  <th style="width: 185px; text-align: center;">Action</th>
                </tr>
              </thead>
              <?php $no=0; ?>
              <tbody>
                 @foreach($keluar as $D)
                 <?php $no++ ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$D->no_surat}}</td>
                  <td>{{$D->kepada}}</td>
                  <td>{{$D->perihal}}</td>
                  <td>{{$D->isi_surat}}</td>
                  <td>
                    <div class="icon-button-demo">
                      <a href="{{url('/surat_keluar/edit/'.$D->id)}}" style="color: white; padding-left: 10px;">
                        <button type="button" class="btn bg-deep-purple btn-circle waves-effect waves-circle waves-float">
                          <i class="material-icons">settings</i>
                        </button>
                      </a>
                      <a href="{{url('/surat_keluar/show/'.$D->id)}}" style="padding-left: 5px;">
                        <button type="button" class="btn bg-purple btn-circle waves-effect waves-circle waves-float">
                          <i class="material-icons">search</i>
                        </button>
                      </a>
                      <?php if ($D->status==2): ?>
                        <a href="" style="padding-left: 5px;">
                            <button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float" disabled>
                              <i class="material-icons">save</i>
                            </button>
                        </a>
                      <?php endif; ?>
                      <?php if ($D->status!=2): ?>
                        <a href="{{url('/surat_keluar/arsip/'.$D->id)}}" style="padding-left: 5px;">
                            <button type="button" class="btn bg-purple btn-circle waves-effect waves-circle waves-float">
                              <i class="material-icons">save</i>
                            </button>
                        </a>
                      <?php endif; ?>
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
