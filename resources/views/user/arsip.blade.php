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

  <a href="{{url('/surat_keluar')}}">
    <i class="material-icons">unarchive</i>
    <span>Surat Keluar</span>
</a>
</li>
<li>
  <li class="active">
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
          <form action="{{url('/surat_masuk/cari')}}" method="get">
            <div class="row clearfix">
              <div class="col-xs-3">
                <h2 class="card-inside-title">Jenis Surat</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <select class="form-control show-tick" name="jenis">
                            <option>-- Please select --</option>
                            <option value="surat masuk">surat masuk</option>
                            <option value="surat keluar">surat keluar</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-xs-6">
                <h2 class="card-inside-title">Jangka Waktu</h2>
                <div class="input-daterange input-group" id="bs_datepicker_range_container">
                  <span class="input-group-addon">Dari</span>
                  <div class="form-line">
                    <input type="date" class="form-control" placeholder="Date start..." name="dari">
                  </div>
                  <span class="input-group-addon">Sampai</span>
                  <div class="form-line">
                    <input type="date" class="form-control" placeholder="Date end..." name="sampai">
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
              <button type="submit" name="button" class="btn btn-primary waves-effect">CARI</button>
            </div>
            </div>
          </form>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jenis Surat</th>
                  <th>Surat Dari</th>
                  <th>Tanggal Surat</th>
                  <th>Tanggal Diterima</th>
                  <th>No Surat</th>
                  <th>No Agenda</th>
                  <th>Perihal</th>
                  <th>Kepada</th>
                  <th>Isi Disposisi</th>
                  <th>Diteruskan Kepada</th>
                </tr>
              </thead>
              <?php $no=0; ?>
              <tbody>
                @foreach($arsip as $data)
                <?php $no++; ?>
               <tr>
                 <td>{{$no}}</td>
                 <td>{{$data->jenis_surat}}</td>
                 <td>{{$data->surat_dari}}</td>
                 <td>{{$data->tgl_surat}}</td>
                 <td>{{$data->tgl_terima}}</td>
                 <td>{{$data->no_surat}}</td>
                 <td>{{$data->no_agenda}}</td>
                 <td>{{$data->perihal}}</td>
                 <td>{{$data->kepada}}</td>
                 <td>{{$data->isi_disposisi}}</td>
                 <td>{{$data->diteruskan_kepada}}</td>
               </tr>
               @endforeach
              </tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
