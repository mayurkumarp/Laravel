<div class="topbar" style="background: #221e22">
        <div class="container">
            <div class="pull-left">
                <ul class="topbar-drops list-inline">
                    <li class=""><a class="clearfix" href="/"><img src="{{asset('images/logo_purple.png')}}" alt="Trips"></a></li>
                    <li class="tagline"><i class="fa fa-quote-left"></i> Tag line................................. <i class="fa fa-quote-right"></i></li>
                </ul><!-- end list-style -->
            </div><!-- end left -->
            <div class="pull-right">
                <ul class="topbar-social list-inline">
                    @if (Auth::guest())
                        <li><a href="login" ><i class="fa fa-sign-in"></i> LOGIN</a></li>
                        <li class="dropdown clear"><a href="login" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-sign-in"></i> REGISTER</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/guide/register') }}">Register as Guide</a></li>
                                <li><a href="{{ url('/bookie/register') }}">Register as Bookie</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle flex" data-toggle="dropdown" role="button" aria-expanded="false">
                                @if(Auth::user()->profile_img!=null)
                                    <img class="image img-circle img-sm img-bordered-sm" src="images_profile/{{Auth::user()->profile_img}}" style="
                                                        width: 30px;position: relative;">
                                @elseif(Auth::user()->social_profile!=null)
                                    <img class="image img-circle img-sm img-bordered-sm" src="{{Auth::user()->social_profile}}" style="
                                                        width: 30px;position: relative;">
                                @else
                                    <img class="image img-circle img-sm img-bordered-sm" src="images_profile/default.png" style="
                                                        width: 30px;position: relative;">
                                @endif
                                <span class="pad-left text-white">{{ Auth::user()->first_name." ".Auth::user()->last_name }}</span> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                    
                </ul><!-- end list-style -->
            </div><!-- end right -->
        </div><!-- end container -->
    </div>
@if(Session::has('flash_message_success'))
    <div class="alert alert-success container">{{ Session::get('flash_message_success') }};</div>
@elseif(Session::has('flash_message_error'))
    <div class="alert alert-danger container">{{ Session::get('flash_message_error') }};</div>
@endif
