@extends('usermaster')

@section('content')



    <section class="section clearfix">
        <div class="container">
            <div class="row">
                <div id="fullwidth" class="col-sm-12">
                    <!-- START CONTENT -->
                    <div class="row">
                        <div id="content" class="col-md-12 col-sm-12 col-xs-12">
                            <div class="post-wrapper row clearfix">
                                @if(Request::is('admin*'))
                                <div class="col-md-3 col-sm-12 col-xs-12 pad"></div>
                                @else
                                <div class="col-md-6 col-sm-12 col-xs-12 pad">
                                    <h5>NEW USER</h5>
                                    <hr>
                                    <a href="register" class="btn btn-primary btn-normal">Register Now</a>
                                </div><!-- end col -->
                                @endif
                                <div class="col-md-6 col-sm-12 col-xs-12 form-cust">
                                    <h5>{{trim(Request::route()->getPrefix(),'/')}}</h5>
                                    <br>

                                    @if(Request::is('admin*'))
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                                      @elseif(Request::is('guide*'))
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/guide/login') }}">
                                      @else
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                      @endif
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-sm-2 control-label">Username:</label>

                                                <div class="col-sm-10">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email">

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-sm-2 control-label">Password:</label>

                                                <div class="col-sm-10">
                                                    <input id="password" type="password" class="form-control" name="password" placeholder="password">

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input class="checkbox checkbox-info" type="checkbox" name="remember"> Remember Me
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-sm-offset-2 col-sm-4">
                                                    <button type="submit" class="btn btn-primary btn-normal pull-right">
                                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                                    </button>
                                                </div>
                                            </div>
                                            @if(!Request::is('admin*'))
                                            <div class="form-group">
                                                <div class="col-sm-12 text-center">                                                    
                                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                                </div>
                                            </div>
                                            @endif
                                        </form>

                                </div><!-- end col -->


                            </div><!-- end post-wrapper -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <!-- END CONTENT -->

                </div><!-- end fullwidth -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->
@endsection
