@extends('layouts/master_dashboard')
@section('content')
<style>
    .h5{
        color: #888;
    }
    .h5 .fa-google-plus{
        color:#da2524;
    }
    .h5 .fa-facebook{
        color: #4867aa;
    }
    .h5 .fa-linkedin{
        color: #0177b5;
    }
    .h5 .fa-instagram{
        color: #a036b3;
    }
    .pad-bottom{
        padding-bottom: 10px;
    }
    a:hover i{
        color: #fff !important;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-body">
                    <!--CONTENT-->
                    <div class="row overflow">
                        <div class="col-lg-8">
                            <!--USER DETALI-->
                            <div class="row overflow bg-gray-light pad">
                                <!--IMAGE-->
                                <div class="col-md-3 pad border-right-cust">
                                    <div class="row ">
                                        @if($user->profile_img!=null)
                                            <img style="width: 150px;height: 150px;margin: 0 auto" class="img-circle img-responsive" src="{{url('/images_profile').'/'.$user->profile_img}}" alt="Bookie profile"/>
                                        @elseif($user->social_profile!=null)
                                            <img style="width: 150px;height: 150px;margin: 0 auto" class="img-circle  img-responsive" src="{{$user->social_profile}}" alt="Bookie profile"/>
                                        @else
                                            <img style="width: 150px;height: 150px;margin: 0 auto" class="img-circle  img-responsive" src="{{url('/images_profile').'/'.'default.png'}}" alt="Bookie profile"/>
                                        @endif
                                    </div>
                                    <hr class="row">
                                    <!--FOLLOW-->
                                    <div class="col-md-12">
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                                            <span class="col-lg-12" style="font-size: 150%">{{str_pad($follow->following,2,0,STR_PAD_LEFT)}}</span>
                                            <span class="text-sm">following</span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                                            <span class="col-lg-12" style="font-size: 150%">{{str_pad($follow->follower,2,0,STR_PAD_LEFT)}}</span>
                                            <span class="text-sm">follower</span>
                                        </div>
                                    </div>
                                </div>
                                <!--DATA-->
                                <div class="col-md-8" >
                                    <!--NAME & GENDER-->
                                    <div class="row"><br></div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <span class="h3">{{ucfirst($user->first_name)." ".ucfirst($user->last_name)}}</span></br>
                                            <span class="text-sm">Joined On : <?=date_format($user->created_at,'d F Y')?></span>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-2 text-center">
                                            @if($user->gender=='male')
                                            <span class="h3"><i class="fa fa-mars"></i></span><br> {{$user->gender}}
                                            @elseif($user->gender=='female')
                                                <span class="h3"><i class="fa fa-venus"></i></span><br> {{$user->gender}}
                                            @elseif($user->gender=='other')
                                                <span class="h3"><i class="fa fa-genderless"></i></span><br> trance
                                            @endif 
                                        </div>
                                    </div>
                                    <hr class="hr_0">
                                    <div class="row">
                                        <!--EMAIL-->
                                        <div class="col-md-6">
                                            <div class="col-md-2 h5">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <div class="col-md-8 pad">
                                                {{$user->email}}
                                            </div>
                                        </div>
                                        <!--CONTACT-->
                                        @if(count($user->phone_number) && $user->phone_number!=null)
                                        <div class="col-md-6">
                                                <div class="col-md-2 h5">
                                                    <i class="fa fa-phone-square"></i>
                                                </div>
                                                <div class="col-md-8 pad">
                                                    {{$user->phone_number}}
                                                </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!--ADDRESS-->
                                    @if(count($user->address) || count($user->city) || count($user->state) || count($user->country))
                                    <div class="col-md-12 row no-pad-top">
                                        <div class="col-md-3 h5 text-bold">
                                            Address 
                                        </div>
                                        <div class="col-md-8 pad text-capitalize">
                                        @if(count($user->address))
                                            {{$user->address}},
                                        @endif
                                        @if(count($user->city))
                                            {{$user->city}}<br>
                                        @endif
                                        @if(count($user->state))
                                            {{$user->state}}<br>
                                        @endif
                                        @if(count($user->country))
                                            {{$user->country}}
                                        @endif
                                        </div>
                                    </div>
                                    @endif
                                    <!--SOCIAL-->
                                    @if(count($user->usersocial))
                                    <div class="col-md-12 row">
                                        <div class="col-md-3 h5 text-bold">
                                            Social 
                                        </div>
                                        <div class="col-md-8 text-left">
                                        @foreach($user->usersocial as $social)    
                                        <a class="" target="_blank" href="{{$social->profile_url}}">
                                            <span class="col-md-2 h5">
                                                    @if($social->type=='g+')
                                                        <i class="fa fa-google-plus"></i>
                                                    @elseif($social->type=='facebook')
                                                        <i class="fa fa-facebook"></i>
                                                    @elseif($social->type=='linkedin')
                                                        <i class="fa fa-linkedin"></i>
                                                    @elseif($social->type=='instagram')
                                                        <i class="fa fa-instagram"></i>
                                                    @endif
                                            </span>
                                        </a>
                                        @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            @if(count($user->activities))
                            <!--ACTIVITIES-->
                            <div class="row overflow">
                                <div class="col-md-12">
                                    <span class="h5 pad">
                                        Activities :<br>
                                    </span>
                                    <div class="col-md-12 h5 h6 pad text-center text-uppercase">
                                        @if(count($user->activities))
                                        <?php $activity=  explode(',', $user->activities);
                                            foreach ($activity as $ac) { ?>
                                                <span class="well well-sm col-md-2 col-sm-6 col-xs-6"> {{$ac}} </span>
                                            <?php }?>
                                        @else
                                        <span class="well">Not Specified</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!--ABOUT-->
                            @if(count($user->about))
                            <div class="row overflow">
                                <div class="col-md-12">
                                    <span class="h5 pad">
                                        About :<br>
                                    </span>
                                    <div class="col-md-12 h5 ">
                                        <pre class="well col-md-12">{{$user->about}}</pre>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <!--OTHER TRIP LIST-->
                        <div class="col-lg-3 border-left side_nav_box">
                            <div class="row side_nav_box_title">
                                <samp>Trips By User :</samp>
                            </div>
                            <div class="row side_content">
                                <div class="side_nav">
                                    <!--SINGLE-->
                                    @if(count($user->trips))
                                    @foreach($user->trips as $trip)
                                    <a href="{{url('/admin/trip/'.$trip->id)}}">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="image img-md" src="{{url('/images_cover').'/'.$trip->cover_img}}"/>
                                        </div>
                                        <div class="col-md-10 ">
                                            <div class="col-md-12 lbl">{{$trip->title}}</div>
                                            <div class="col-md-12 text-sm">{{substr($trip->description,0,50).'...'}}</div>
                                            <div class="top-right text-sm">
                                                <!--IS DELETED-->
                                                @if($trip->is_deleted)
                                                    <i class="fa fa-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Deleted"></i>
                                                @endif
                                              <!--IS PRIVATE-->
                                                @if($trip->is_private)
                                                    <i class="fa fa-eye-slash text-warning" data-toggle="tooltip" data-placement="bottom" title="Private"></i>
                                                @endif
                                              <!--IS DELETED-->
                                                @if($trip->is_published==0)
                                                    <i class="fa fa-file-text  text-yellow" data-toggle="tooltip" data-placement="bottom" title="Drafted"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                    <!--END SINGLE-->
                                    <hr class="hr_0">
                                    @endforeach
                                    @else
                                    <span class="h4">not yet published</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
