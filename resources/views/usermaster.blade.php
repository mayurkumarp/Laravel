<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>laravel</title>


    <!-- Bootstrap -->
    <link href="{{asset('dist/css/bootstrap.css')}}" rel="stylesheet">



    
</head>
<body>

<div id="wrapper">
    

    @yield('content')<!--end content-->

  
</div><!-- end wrapper -->

    <script src="{{asset('dist/js/jquery.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery-ui.js')}}"></script>
    <script src="{{asset('dist/js/formValidation.min.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap.min_1.js')}}"></script>
    <script src="{{asset('dist/js/custom_1.js')}}"></script>
    <script src="{{asset('dist/js/custom.js')}}"></script>



</body>

</html>