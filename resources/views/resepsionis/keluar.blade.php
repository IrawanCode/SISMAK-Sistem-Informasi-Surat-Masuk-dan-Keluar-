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
    <li class="active">
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

@section('judul_halaman', 'Surat Keluar')

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
                  <th style="width: 20px; text-align:center;">#</th>
                  <th style="width: 230px; text-align:center;">No Surat</th>
                  <th style="text-align:center;">Kepada</th>
                  <th style="text-align:center;">Perihal</th>
                  <th style="width: 200px; text-align:center;">Isi Surat</th>
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
