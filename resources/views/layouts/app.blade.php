<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>UniFP - @yield('title','Futuro no Presente')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ url('imagens/icons/icon-fp.png') }}" type="image/x-icon" />

    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css"> -->
    <link rel="stylesheet" href="{{ url('css/timepicker.css') }}">
    <link rel="stylesheet" href="{{ url('css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"> --}}
    <link rel="stylesheet" href="{{ url("css/datatables.css") }}">

    @yield('css')
</head>

<body class="skin-green sidebar-mini">
    @if (!Auth::guest())

    <!-- Main Header -->
    <header class="main-header">
        <nav class="navbar navbar-static-top">

            <div class="navbar-header">
                <a href="/home" class="navbar-brand"> <img src="{{ url('imagens/logo/logo-unifp.png') }}"
                        alt="Logo UniFP" style="height: 2.5rem;"> </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav ">
                    <li class="dropdown drop-menu-mobile">
                        <ul class="sidebar-menu" data-widget="tree" style="font-size: 1.2rem">
                            @include('layouts.menu')
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" style="font-size: 2rem"></i>
                            {{ Auth::user()->name }}

                        </a>
                        <ul class="dropdown-menu" style="width: 5rem">
                            <li class="user-footer">
                                <div>
                                    <a href="#" class="btn btn-danger btn-block" class="botao-logout-mobile"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Sair</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;"> @csrf </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="{!! route('unidades.index') !!}" ><i class="fa fa-bank"></i>
                            {{ Session::get('nomeUnidade') }}
                         </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
            <!-- /.container-fluid -->
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        © 2019 <strong>UNIFP - SISTEMA DE GESTÃO</strong>
    </footer>


    @else
    <script>window.location = "/login";</script>

    @endif

    <!-- jQuery 3.1.1 -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('.editor1'));
        ClassicEditor.create(document.querySelector('.editor2'));
        ClassicEditor.create(document.querySelector('.editor3'));
        ClassicEditor.create(document.querySelector('.editor4'));
        // ClassicEditor.create(document.querySelector('.editor5')).catch( error => {console.error( error );});
        // ClassicEditor.create(document.querySelector('.editor6')).catch( error => {console.error( error );});
        // ClassicEditor.create(document.querySelector('.editor7')).catch( error => {console.error( error );});
    </script>
    <script src="{{ url("js/datatables.js") }}"></script>
    <script>
        $(document).ready(function() {
            $('.datatable-list').DataTable();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    @yield('scripts')
</body>

</html>
