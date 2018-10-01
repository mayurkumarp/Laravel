@extends('usermaster')

@section('content')
<section id="page-header" class="section background">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Registration</h3>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->
    <section class="section clearfix">
        <div class="container">
            <div class="row">
                <div id="fullwidth" class="col-sm-12">

                    <!-- START CONTENT -->
                    <div class="row">
                        <div id="content" class="col-md-12 col-sm-12 col-xs-12">
                            <div class="post-wrapper row clearfix">
                                <div class="col-md-7 col-sm-12 col-xs-12 form-cust" >
                                    
                                    @if(Request::is('admin/*'))
                                      @yield('register_form')
                                    @elseif(Request::is('guide/*'))
                                      @yield('register_form')
                                    @else
                                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                      <div class="">
                                          {{ csrf_field() }}
                                          <div class="form-group{{ $errors->has('first_name')||$errors->has('last_name') ? ' has-error' : '' }}">
                                                  <label for="first_name" class="col-sm-3 control-label">Name:</label>

                                                  <div class="col-sm-4">
                                                      <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="first name">

                                                      @if ($errors->has('first_name'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('first_name') }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              
                                                  <div class="col-sm-4">
                                                      <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="last name">

                                                      @if ($errors->has('last_name'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('last_name') }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                          </div>
                                          <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                                  <label class="col-sm-3 control-label">Gender:</label>
                                                  <div class="col-sm-8">
                                                        <input type="radio" name="gender" value="male"> Male </span>
                                                        <input type="radio" name="gender" value="female"> Female </span>
                                                   @if ($errors->has('gender'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('gender') }}</strong>
                                                      </span>
                                                  @endif
                                                  </div>
                                          </div>


                                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email" class="col-sm-3 control-label">E-Mail:</label>

                                              <div class="col-sm-8">
                                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="abc@xyz.com">

                                                  @if ($errors->has('email'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('email') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                              <label for="password" class="col-sm-3 control-label">Password:</label>

                                              <div class="col-sm-8">
                                                  <input id="password" type="password" class="form-control" name="password" placeholder="minimum of 6 digits">

                                                  @if ($errors->has('password'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('password') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                              <label for="password-confirm" class="col-sm-3 control-label">Confirm Password:</label>

                                              <div class="col-sm-8">
                                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirm password">

                                                  @if ($errors->has('password_confirmation'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <div class="col-sm-8 col-sm-offset-3">
                                                  <button type="submit" class="btn btn-primary btn-normal pull-right">
                                                      <i class="fa fa-btn fa-user"></i> Register
                                                  </button>
                                              </div>
                                          </div>
                                      </div>
                                      </form>
                                    @endif
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
