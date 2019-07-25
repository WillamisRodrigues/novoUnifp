<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Futuro no Presente - UniFP</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ url('imagens/icons/icon-fp.png') }}" type="image/x-icon" />

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css"> -->
    <link rel="stylesheet" href="{{ url('css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="skin-green hold-transition login-page">
<header class="main-header">
    <nav class="navbar navbar-static-top">
      
        <div class="navbar-header">
          <a href="#" class="navbar-brand"> <img src="{{ url('imagens/logo/logo-unifp.png') }}" alt="Logo UniFP" style="height: 2.5rem;"> </a>
          <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button> -->
        </div>

        <!-- /.navbar-collapse -->
      <!-- /.container-fluid -->
    </nav>
  </header>
  <div class="row" >
    <ol class="breadcrumb pull-right" style="background-color: #D2D6DE; margin-right: 2rem">
        <li ><a href="#" class="text-success"><i class="fa fa-home"></i></a></li>
        <li class="active">Login</li>
    </ol>
  </div>
    <div class="login-box">
    
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Login</a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body corpo-login-inicial">
        <p class="login-box-msg">Faça o login abaixo</p>

        <form method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Senha" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

            </div>
            <div class="container row">
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-unlock"></i> Login</button>
            </div>
        </form>

        <a href="{{ url('/password/reset') }}" class="text-success container">Esqueci minha senha</a><br>
        <!-- <a href="{{ url('/register') }}" class="text-center">Register a new membership</a> -->

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- Main Footer -->
<footer class="footer" style="max-height: 100px;text-align: center">
        © 2019 <strong>UNIFP - SISTEMA DE GESTÃO</strong> All rights reserved.
            <!-- ©2019 UNIFP-SISTEMA DE GESTÃO All rights reserved. -->
        </footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
