<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>SISMAK (Sistem Informasi Surat Masuk dan Surat Keluar)</title>
  <!-- Favicon-->
  <link rel="icon" href="{{url('favicon.ico')}}" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <!-- Bootstrap Core Css -->
  <link href="{{url('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="{{url('plugins/node-waves/waves.css" rel="stylesheet')}}" />

  <!-- Animation Css -->
  <link href="{{url('plugins/animate-css/animate.css" rel="stylesheet')}}" />

  <!-- Custom Css -->
  <link href="{{url('css/style.css')}}" rel="stylesheet">
</head>

<body class="login-page">
  <div class="login-box">
    <div class="logo">
      <!-- <img src="{{asset('images/bps.png')}}" width="50" height="50" style="display: block; margin: auto;"> -->
      <a href="javascript:void(0);" style="margin-top:20px;"><b>SISMAK</b></a>
      <small>Sistem Informasi Surat Masuk dan Surat Keluar</small>
    </div>
    <div class="card">
      <div class="body">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="msg">Sign in to start your session</div>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons">person</i>
            </span>
            <div class="form-line">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-xs-8 p-t-5">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <div class="col-xs-4">
              <a class="nav-link" href="{{ route('login') }}">
                <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
              </a>
            </div>
          </div>
          <!-- <div class="row m-t-15 m-b--20">
          <div class="col-xs-6">
          <a href="sign-up.html">Register Now!</a>
        </div>
        <div class="col-xs-6 align-right">
        <a href="forgot-password.html">Forgot Password?</a>
      </div>
    </div> -->
  </form>
</div>
</div>
</div>

<!-- Jquery Core Js -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{url('plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{url('plugins/node-waves/waves.js')}}"></script>

<!-- Validation Plugin Js -->
<script src="{{url('plugins/jquery-validation/jquery.validate.js')}}"></script>

<!-- Custom Js -->
<script src="{{url('js/admin.js')}}"></script>
<script src="{{url('js/pages/examples/sign-in.js')}}"></script>
</body>

</html>
