<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>SISMAK (Sistem Informasi Surat Masuk dan Surat Keluar)</title>
  <!-- Favicon-->
  <link rel="icon" href="{{url('images/bps.png')}}" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <!-- Bootstrap Core Css -->
  <link href="{{url('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="{{url('plugins/node-waves/waves.css')}}" rel="stylesheet" />

  <!-- Animation Css -->
  <link href="{{url('plugins/animate-css/animate.css')}}" rel="stylesheet" />

  <!-- Morris Chart Css-->
  <link href="{{url('plugins/morrisjs/morris.css')}}" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="{{url('css/style.css')}}" rel="stylesheet">

  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="{{url('css/themes/all-themes.css')}}" rel="stylesheet" />
  <!-- Bootstrap Core Css -->
  <link href="{{url('/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="{{url('/plugins/node-waves/waves.css')}}" rel="stylesheet" />

  <!-- Animation Css -->
  <link href="{{url('/plugins/animate-css/animate.css')}}" rel="stylesheet" />

  <!-- Bootstrap Material Datetime Picker Css -->
  <link href="{{url('/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

  <!-- Bootstrap DatePicker Css -->
  <link href="{{url('/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" />

  <!-- Wait Me Css -->
  <link href="{{url('/plugins/waitme/waitMe.css')}}" rel="stylesheet" />

  <!-- Bootstrap Select Css -->
  <link href="{{url('/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="{{url('/css/style.css')}}" rel="stylesheet">

</head>

<body class="theme-red">
  <!-- Page Loader -->
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="preloader">
        <div class="spinner-layer pl-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
      <p>Please wait...</p>
    </div>
  </div>
  <!-- #END# Page Loader -->
  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>
  <!-- Top Bar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="index.html">SISMAK</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <!-- Call Search -->
          <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
          <!-- #END# Call Search -->
          <!-- Notifications -->
          <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <i class="material-icons">notifications</i>
              @if(auth()->user()->role->role=="Sub. Bag. TU")
              <span class="label-count">{{$count}}</span>
              @endif
              @if(auth()->user()->role->role=="Resepsionis")
                <span class="label-count">{{$hitung}}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="header">NOTIFICATIONS</li>
              <li class="body">
                @if(auth()->user()->role->role=="Sub. Bag. TU")
                <ul class="menu">
                  @foreach($disposisi as $D)
                  <?php if ($D->status==1): ?>
                    <li style="list-style: none;">
                        <a href="javascript:void(0);">
                            <div class="icon-circle bg-blue-grey">
                                <i class="material-icons">comment</i>
                            </div>
                            <div class="menu-info">
                                <h4>{{$D->surat_dari}}(new)</h4>
                                <p>
                                    <i class="material-icons">access_time</i>{{$D->updated_at}}
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
                </ul>
                @endif
                @if(auth()->user()->role->role=="Resepsionis")
                <ul class="menu">
                  @foreach($disposisi as $D)
                  <?php if ($D->status==2): ?>
                    <li style="list-style: none;">
                        <a href="javascript:void(0);">
                            <div class="icon-circle bg-blue-grey">
                                <i class="material-icons">comment</i>
                            </div>
                            <div class="menu-info">
                                <h4>{{$D->surat_dari}} (update)</h4>
                                <p>
                                    <i class="material-icons">access_time</i>{{$D->updated_at}}
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
                </ul>
                @endif

              </li>
              <!-- <li class="footer">
              <a href="javascript:void(0);">View All Notifications</a>
            </li> -->
          </ul>
        </li>
        <!-- #END# Tasks -->
        <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- #Top Bar -->
<section>
  <!-- Left Sidebar -->
  <aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
      <div class="image">
        <img src="{{ asset('images/'.auth()->user()->foto) }}" width="48" height="48">
      </div>
      <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} ({{ auth()->user()->role->role }})</div>
        <div class="email">{{ auth()->user()->email }}</div>
        <div class="btn-group user-helper-dropdown">
          <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
          <ul class="dropdown-menu pull-right">
            <li><a href="{{url('profile')}}"><i class="material-icons">person</i>Profile</a></li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="material-icons">input</i>Sign Out</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
      @yield('menu')
    </div/

  </aside>
  <!-- #END# Left Sidebar -->
  <!-- Right Sidebar -->
  <aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
      <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
      <!-- <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li> -->
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
        <ul class="demo-choose-skin">
          <li data-theme="red" class="active">
            <div class="red"></div>
            <span>Red</span>
          </li>
          <li data-theme="pink">
            <div class="pink"></div>
            <span>Pink</span>
          </li>
          <li data-theme="purple">
            <div class="purple"></div>
            <span>Purple</span>
          </li>
          <li data-theme="deep-purple">
            <div class="deep-purple"></div>
            <span>Deep Purple</span>
          </li>
          <li data-theme="indigo">
            <div class="indigo"></div>
            <span>Indigo</span>
          </li>
          <li data-theme="blue">
            <div class="blue"></div>
            <span>Blue</span>
          </li>
          <li data-theme="light-blue">
            <div class="light-blue"></div>
            <span>Light Blue</span>
          </li>
          <li data-theme="cyan">
            <div class="cyan"></div>
            <span>Cyan</span>
          </li>
          <li data-theme="teal">
            <div class="teal"></div>
            <span>Teal</span>
          </li>
          <li data-theme="green">
            <div class="green"></div>
            <span>Green</span>
          </li>
          <li data-theme="light-green">
            <div class="light-green"></div>
            <span>Light Green</span>
          </li>
          <li data-theme="lime">
            <div class="lime"></div>
            <span>Lime</span>
          </li>
          <li data-theme="yellow">
            <div class="yellow"></div>
            <span>Yellow</span>
          </li>
          <li data-theme="amber">
            <div class="amber"></div>
            <span>Amber</span>
          </li>
          <li data-theme="orange">
            <div class="orange"></div>
            <span>Orange</span>
          </li>
          <li data-theme="deep-orange">
            <div class="deep-orange"></div>
            <span>Deep Orange</span>
          </li>
          <li data-theme="brown">
            <div class="brown"></div>
            <span>Brown</span>
          </li>
          <li data-theme="grey">
            <div class="grey"></div>
            <span>Grey</span>
          </li>
          <li data-theme="blue-grey">
            <div class="blue-grey"></div>
            <span>Blue Grey</span>
          </li>
          <li data-theme="black">
            <div class="black"></div>
            <span>Black</span>
          </li>
        </ul>
      </div>
    </div>
  </aside>
  <!-- #END# Right Sidebar -->
</section>
@yield('profile')
<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h2>@yield('judul_halaman')</h2>
    </div>

    <!-- Widgets -->
    @yield('konten')
    <!-- #END# Widgets -->
  </div>
</section>

<!-- Jquery Core Js -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{url('plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{url('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{url('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{url('plugins/node-waves/waves.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{url('plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Morris Plugin Js -->
<script src="{{url('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{url('plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{url('plugins/flot-charts/jquery.flot.js')}}"></script>
<script src="{{url('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{url('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{url('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
<script src="{{url('plugins/flot-charts/jquery.flot.time.js')}}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{url('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

<!-- Custom Js -->
<script src="{{url('js/admin.js')}}"></script>
<script src="{{url('js/pages/index.js')}}"></script>

<!-- Demo Js -->
<script src="{{url('js/demo.js')}}"></script>


</body>

</html>
