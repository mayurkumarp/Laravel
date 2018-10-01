<?php $skin = 'skin-blue'; ?>
@if(Request::is('admin/*') && Auth::guard('admin')->check())
<?php
$user = Auth::guard('admin')->user();
$guard = 'admin';
$skin = 'skin-blue';
$url = url('/admin')
?>
@elseif(Request::is('guide/*') && Auth::guard('guide')->check())
<?php
$user = Auth::guard('guide')->user();
$guard = 'guide';
$skin = 'skin-yellow';
$url = url('/guide')
?>
@else
<script>window.location = "/login";</script>
@endif
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>laravel | <?= ucfirst($guard) ?> | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!--LOGO-->

        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
        <!-- Full Calender -->
        <link rel="stylesheet" href="{{asset('plugins/fullcalendar/fullcalendar.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
        <!-- TOGGLE BUTTON -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <!-- DIALOG -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.3/css/bootstrap-dialog.min.css" rel="stylesheet">
        <!--FORM VALIDATION-->
        <link rel="stylesheet" href="{{asset("/dist/css/formValidation.css")}}"/>
        <!-- DATATABLE -->
        <link href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- CUSTOM -->
        <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('dist/css/common.css')}}">
        <link rel="stylesheet" href="{{asset('dist/css/bootstrap-tokenfield.css')}}">
        <link rel="stylesheet" href="{{asset('dist/css/tokenfield-typeahead.css')}}">

    </head>
    <body class="fixed hold-transition {{$skin}} sidebar-mini">

        <div class="wrapper">
            @include('layouts/header')

            @include('layouts/sidebar')
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="row">

                    <div class="col-md-10 col-md-offset-1">
                        @include('flash::message')
                    </div>
                </div>
                @yield('content') 
            </div>
            @include('layouts/footer')
        </div>

        <!-- jQuery 2.2.0 -->
        <script src="{{asset('plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
    $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('dist/js/bootstrap-tokenfield.min.js')}}"></script>

        <!-- TOGGLE BUTTON SCRIPT -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <!-- DIALOG SCRIPT -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.3/js/bootstrap-dialog.min.js"></script>
        <!--VALIDATION SCRIP-->
        <script type="text/javascript" src="{{asset("dist/js/formValidation.min.js")}}"></script>
        <script type="text/javascript" src="{{asset("dist/js/bootstrap.min.js")}}"></script>
        <!-- DATATABLE SCRIPT -->
        <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/app.min.js')}}"></script>
        @yield('script')

    </body>
</html>