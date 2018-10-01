@extends('usermaster')

@section('content')

@include('front/header')<!-- end header -->

    <section class="section fullscreen background parallax" style="background-image:url('{{asset('dist/upload/parallax_04.jpg')}}" data-img-width="1920" data-img-height="1133" data-diff="100">
        <div class="container">
            <div class="row homeform">
                <div class="col-md-5 col-xs-12">
                    <div class="home-form">
                        <!-- Nav tabs -->
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab"><i class="icon-hotel68"></i></a></li>
                            <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab"><i class="icon-airplane70"></i></a></li>
                            <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab"><i class="icon-sedan3"></i></a></li>
                            <li><a href="#tab_04" aria-controls="tab_04" role="tab" data-toggle="tab"><i class="icon-location38"></i></a></li>
                            <li><a href="#tab_05" aria-controls="tab_05" role="tab" data-toggle="tab"><i class="icon-bicycle12"></i></a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab_01">
                                <h6>WHERE WOULD YOU LIKE TO GO?</h6>
                                <form class="bookform form-inline row">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Destination: Country, City,Airport,...">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Check in" id="datepicker">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Check out" id="datepicker1">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group make-margin col-md-6 col-sm-6 col-xs-12">
                                        <div class="dropdown">
                                            <select class="selectpicker" data-style="btn-white">
                                                <option>Adults</option>
                                                <option>2+1 with Bedroom + 2 Child</option>
                                                <option>1+1 with Bedroom + 1 Child</option>
                                                <option>2+1 with Bedroom + Full</option>
                                                <option>Full Services 15 Days</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group make-margin col-md-6 col-sm-6 col-xs-12">
                                        <div class="dropdown">
                                            <select class="selectpicker" data-style="btn-white">
                                                <option>Max Budget</option>
                                                <option>0 - $1000</option>
                                                <option>0 - $2000</option>
                                                <option>0 - $3000</option>
                                                <option>0 - $5000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="icon-search"></i> BOOK NOW</button>
                                    </div>
                                </form>
                            </div><!-- end tab-pane -->

                            <div role="tabpanel" class="tab-pane" id="tab_02">
                                <h6>WHEN WOULD YOU LIKE TO GO?</h6>
                                <form class="bookform form-inline row">
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Destination: Country, City,Airport...">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Hotel: TUNAI, HAWAI...">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Time: May, Jun, Jully...">
                                    </div>

                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="icon-search"></i> BOOK NOW</button>
                                    </div>
                                </form>
                            </div><!-- end tab-pane -->

                            <div role="tabpanel" class="tab-pane" id="tab_03">
                                <h6>WHICH WOULD YOU LIKE TO GO?</h6>
                                <form class="bookform form-inline row">
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Destination: Country, City,Airport,...">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Check in" id="datepicker2">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Check out" id="datepicker3">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group make-margin col-md-6 col-sm-6 col-xs-12">
                                        <div class="dropdown">
                                            <select class="selectpicker" data-style="btn-white">
                                                <option>Adults</option>
                                                <option>2+1 with Bedroom + 2 Child</option>
                                                <option>1+1 with Bedroom + 1 Child</option>
                                                <option>2+1 with Bedroom + Full</option>
                                                <option>Full Services 15 Days</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group make-margin col-md-6 col-sm-6 col-xs-12">
                                        <div class="dropdown">
                                            <select class="selectpicker" data-style="btn-white">
                                                <option>Max Budget</option>
                                                <option>0 - $1000</option>
                                                <option>0 - $2000</option>
                                                <option>0 - $3000</option>
                                                <option>0 - $5000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="icon-search"></i> BOOK NOW</button>
                                    </div>
                                </form>
                            </div><!-- end tab-pane -->

                            <div role="tabpanel" class="tab-pane" id="tab_04">
                                <h6>HOW WOULD YOU LIKE TO GO?</h6>
                                <form class="bookform form-inline row">
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Destination: Country, City,Airport...">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Hotel: TUNAI, HAWAI...">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Time: May, Jun, Jully...">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="icon-search"></i> BOOK NOW</button>
                                    </div>
                                </form>
                            </div><!-- end tab-pane -->

                            <div role="tabpanel" class="tab-pane" id="tab_05">
                                <h6>REALLY? YOU LIKE TO GO?</h6>
                                <form class="bookform form-inline row">
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Destination: Country, City,Airport...">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Hotel: TUNAI, HAWAI...">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder=" Time: May, Jun, Jully...">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="icon-search"></i> BOOK NOW</button>
                                    </div>
                                </form>
                            </div><!-- end tab-pane -->
                        </div><!-- end tab-content -->
                    </div><!-- end homeform -->
                </div><!-- end col -->

                <div class="col-md-7 col-xs-12">
                    <div class="home-message">
                        <h1>LET’S DISCOVER THE<br>WORLD TOGETHER</h1>
                        <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia, priceline, hotels.com, travelocity, kayak, orbitz, etc. This guys can’t be wrong. You should definitely give it a shot :)</p>
                    </div><!-- end homemessage -->
                </div><!-- end col -->            
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->
    
    <section class="little-padding section section-light clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-xs-6">
                    <a href="#"><img src="{{asset('dist/upload/client_01.png')}}" alt="" class="img-responsive"></a>
                </div><!-- end col -->
                <div class="col-md-2 col-xs-6">
                    <a href="#"><img src="{{asset('dist/upload/client_02.png')}}" alt="" class="img-responsive"></a>
                </div><!-- end col -->
                <div class="col-md-2 col-xs-6">
                    <a href="#"><img src="{{asset('dist/upload/client_03.png')}}" alt="" class="img-responsive"></a>
                </div><!-- end col -->
                <div class="col-md-2 col-xs-6">
                    <a href="#"><img src="{{asset('dist/upload/client_04.png')}}" alt="" class="img-responsive"></a>
                </div><!-- end col -->
                <div class="col-md-2 col-xs-6">
                    <a href="#"><img src="{{asset('dist/upload/client_01.png')}}" alt="" class="img-responsive"></a>
                </div><!-- end col -->
                <div class="col-md-2 col-xs-6">
                    <a href="#"><img src="{{asset('dist/upload/client_02.png')}}" alt="" class="img-responsive"></a>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->  

    <section class="section">
        <div class="container">
            <div class="hotel-title">
                <h4>TOP POPULAR TRIPS MOST VISITED</h4>
            </div><!-- end hotel-title -->
          <!--TOP POPULAR TRIPS-->
            <div class="row">
                @foreach($popular as $key => $pop)
                    <div class="mini-desti col-md-6 {{$key+1==5||$key+1==6?'noborder':''}}">
                        <div class="col-md-4">
                            <img src="{{asset('images_cover/'.$pop->cover_img)}}" alt="" class="img-responsive">
                        </div><!-- end col -->
                        <div class="col-md-8">
                            <div class="mini-desti-title">
                                <div class="pull-left">
                                    <h6>{{$pop->title}}</h6>
                                </div>
                                <div class="pull-right">
                                    <h6></h6>
                                </div>  
                                <div class="clearfix"></div>   
                                <div class="mini-desti-desc">
                                    <p>{{substr($pop->description,0,90)}}
                                        {{strlen($pop->description)>90?'...':''}}
                                        <a class="btn btn-link btn-sm" href="#">read more</a></p>
                                </div>
                            </div><!-- end title -->
                        </div><!-- end col -->
                    </div><!-- end mini-desti -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->  

    <section class="section fullscreen background parallax" style="background-image:url('{{asset('dist/upload/parallax_03.jpg')}}');" data-img-width="1920" data-img-height="586" data-diff="10">
        <div class="container">
            <div id="testimonials">
                @foreach($review as $rev)
                <div class="testi-item">
                    <div class="hotel-title text-center">
                        <h3>{{$rev->title}}</h3>
                        <hr>
                        <p>{{$rev->description}}</p>
                        <span class="flex row">
                            <img style="margin: 0 auto;width: 5rem" class="img-circle img-thumbnail img-sm" 
                                 src="images_profile/{{$rev->user->profile_img!=null?$rev->user->profile_img:'default.png'}}" />
                        </span>
                        <h6 class="pad">- {{$rev->user->first_name." ".$rev->user->last_name}} -</h6>
                    </div>
                </div><!-- end testi-item -->
                @endforeach
            </div><!-- end testimonials -->
        </div><!-- end container -->
    </section><!-- end section -->

    <section class="section clearfix section-bottom">
        <div class="container">
            <div class="hotel-title">
                <h3>OUR SERVICES</h3>
                <hr class="left">
            </div><!-- end hotel-title -->
            <div class="row">
                <div class="col-md-9">
                    <div class="service-style row">
                        <div class="icon-container border-radius col-md-3 col-sm-3 col-xs-3">
                            <i class="icon-location38"></i>
                        </div>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                        <h5>TRAVEL DIARIES</h5>
                        <p>Providing platform to write, post and share your Travel experience to the world. Also to be inspired from other users Trips.</p>
                        </div>
                    </div><!-- end service -->
                    
                    <div class="service-style row">
                        <div class="icon-container border-radius col-md-3 col-sm-3 col-xs-3">
                            <i class="icon-hotel16"></i>
                        </div>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                        <h5>HOTEL CONTACT INFO.</h5>
                        <p>Here is an opportunity for advertisement about your Hotels.You just have to register and post your hotel details and thats it.We'll suggest your hotels to users according to there location of travel.</p>
                        </div>
                    </div><!-- end service -->

                    <div class="service-style row">
                        <div class="icon-container border-radius col-md-3 col-sm-3 col-xs-3">
                            <i class="icon-airplane51"></i>
                        </div>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                        <h5>BOOK CHEAP FLIGHTS ONLINE</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est, impedit incidunt, laboriosam maxime molestias numquam odio officiis. Ab aut dignissimos ea est, impedit incidunt.</p>
                        </div>
                    </div><!-- end service -->

                    <div class="service-style row">
                        <div class="icon-container border-radius col-md-3 col-sm-3 col-xs-3">
                            <i class="icon-sedan3"></i>
                        </div>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                        <h5>TAXI CAB BOOKING HOTLINES</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est, impedit incidunt, laboriosam maxime molestias numquam odio officiis. Ab aut dignissimos ea est, impedit incidunt.</p>
                        </div>
                    </div><!-- end service -->

                    
                </div><!-- end col -->

                <div class="col-md-3">
                    <img src="{{asset('dist/upload/girl.png')}}" alt="" class="img-responsive">
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->  

    <section class="section section-light clearfix">
        <div class="container">
            <div class="top-destinations clearfix">
                <div class="hotel-title text-center">
                    <h3>BEST DESTINATIONS FOR SUMMER</h3>
                    <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo<br> travel, expedia, priceline, hotels.com,travelocity, kayak, orbitz, etc. This guys can’t be wrong.<br> You should definitely give it a shot :)</p>
                    <hr>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="clearfix">
                            <div class="post-media clearfix">
                                <a href="blog-single.html"><img src="{{asset('dist/upload/home_desti_02.jpg')}}" alt="" class="img-responsive"></a>
                            </div><!-- end post-media -->

                            <div class="post-title clearfix">
                                <div class="pull-left">
                                    <h5><a href="blog-single.html">AUSTRALIA</a></h5>
                                    <h6>990 PLACES</h6>
                                </div>
                                <div class="pull-right">
                                    <h5>FROM <span>$490</span></h5>
                                </div>
                            </div><!-- end ost-title -->
                            <div class="post-content clearfix">
                                <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia, priceline, hotels.com, kayak, orbitz, etc. This guys can’t be wrong. You should definitely give it a shot :)</p>
                            </div><!-- end post-content -->
                        </div><!-- end post-wrapper -->
                    </div><!-- end col -->

                    <div class="col-sm-6">
                        <div class="clearfix">
                            <div class="post-media clearfix">
                                <a href="blog-single.html"><img src="{{asset('dist/upload/home_desti_01.jpg')}}" alt="" class="img-responsive"></a>
                            </div><!-- end post-media -->

                            <div class="post-title clearfix">
                                <div class="pull-left">
                                    <h5><a href="blog-single.html">ISTANBUL</a></h5>
                                    <h6>120 PLACES</h6>
                                </div>
                                <div class="pull-right">
                                    <h5>FROM <span>$331</span></h5>
                                </div>
                            </div><!-- end ost-title -->
                            <div class="post-content clearfix">
                                <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia, priceline, hotels.com, kayak, orbitz, etc. This guys can’t be wrong. You should definitely give it a shot :)</p>
                            </div><!-- end post-content -->
                        </div><!-- end post-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end related-hotels -->

            <hr>
            <br>

            <div class="clearfix">
                <div class="row">
                    @foreach($hotel as $h)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="clearfix">
                            <div class="hotel-wrapper">
                                <div class="post-media">
                                    <a href="hotel-single.html"><img src="images_hotel/{{$h->cover_img}}" alt="" class="img-responsive"></a>
                                </div><!-- end media -->
                                <div class="post-title clearfix">
                                    <div class="pull-left">
                                        <h5><a href="hotel-single.html" title="">{{$h->name}}</a></h5>
                                    </div><!-- end left -->
                                    <div class="pull-right">
                                        <h6>$500</h6>
                                    </div><!-- end left -->
                                </div><!-- end title -->
                                <span class="rating">
                                    @for($i=0;$i<$h->rate;$i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </span><!-- end rating -->
                                <p>{{$h->description}}</p>
                            </div><!-- end hotel-wrapper -->                            
                        </div><!-- end clearfix -->
                    </div><!-- end col -->
                    @endforeach
                </div><!-- end row -->
            </div>
        </div><!-- end container -->
    </section><!-- end section -->

    <section class="section fullscreen background parallax" style="background-image:url('{{asset('dist/upload/parallax_05.jpg')}}');" data-img-width="1921" data-img-height="665" data-diff="20">
        <div class="container">
            <div class="home-message text-center">
                <h1>LET’S DISCOVER THE<br>WORLD TOGETHER</h1>
                <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo<br> travel, expedia, priceline, hotels.com, travelocity, kayak, orbitz, etc. This guys can’t be wrong.<br> You should definitely give it a shot :)</p>
                <a href="#" class="btn btn-primary btn-lg">READ MORE</a>
            </div><!-- end homemessage -->
        </div><!-- end container -->
    </section><!-- end section -->

    <section class="section clearfix">
        <div class="container">
            <div class="popular-destinations clearfix">
                <div class="hotel-title">
                    <h5>MOST LIKED TRIPS</h5>
                </div>
                <div class="row">
                    @foreach($liked as $key => $l)
                    @if($key==0)
                    <div class="col-sm-6">
                        <div class="clearfix">
                            <div class="post-media clearfix">
                                <a href="blog-single.html"><img src="images_cover/{{$l->cover_img}}" alt="" class="img-responsive"></a>
                            </div><!-- end post-media -->

                            <div class="post-title clearfix">
                                <h5><a href="blog-single.html">{{$l->title}}</a></h5>
                                <span><i class="fa fa-heart"></i> {{$l->likes}}</span>
                            </div><!-- end ost-title -->

                            <div class="post-meta home-blog-list clearfix">
                                <span><i class="icon-attach"></i> {{date('d M Y', strtotime($l->created_at))}}</span>
                                @if($l->location)
                                 <span><i class="icon-map110"></i> {{$l->location}}</span>
                                @endif
                            </div><!-- ne dpost-meta -->
                            
                            <div class="post-content clearfix">
                                <p>{{$l->description}}</p>
                            </div><!-- end post-content -->
                        </div><!-- end post-wrapper -->
                    </div><!-- end col -->
                    
                    <div class="col-md-6">
                        <div class="row">
                            @else
                                <div class="clearfix">
                                <div class="col-sm-6">
                                    <div class="post-media clearfix">
                                        <a href="blog-single.html"><img src="images_cover/{{$l->cover_img}}" alt="" class="img-responsive"></a>
                                    </div><!-- end post-media -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="post-title clearfix">
                                        <h5><a href="blog-single.html">{{$l->title}} </a></h5>
                                        <span><i class="fa fa-heart"></i> {{$l->likes}}</span>
                                    </div><!-- end ost-title -->
                                    @if($l->location)
                                    <div class="post-meta home-blog-list clearfix">
                                        <span><i class="icon-map110"></i> {{$l->location}}</span>
                                    </div><!-- ne dpost-meta -->
                                    @endif
                                    <div class="post-meta home-blog-list clearfix">
                                        
                                    </div><!-- ne dpost-meta -->
                                    <div class="post-content clearfix">
                                        <p>{{$l->description}}</p>
                                    </div><!-- end post-content -->
                                </div><!-- end col -->
                            </div><!-- end clearfix -->
                            @endif
                            @endforeach
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end related-hotels -->
        </div><!-- end container -->
    </section><!-- end section -->

<!--    <article class="map-section">
        <div id="map"></div>
    </article> end section -->
@endsection