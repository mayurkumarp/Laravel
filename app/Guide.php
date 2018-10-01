<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Guide extends Authenticatable
{
    protected $guard= "guide";
    protected $table="guides";


    protected $fillable=[
        'available','first_name','last_name','gender','email','password','phone_number','address','city','state'
    ];
    protected $hidden=[
        'password','remember_token'
    ];
    
    public function availability(){
        return $this->hasMany('App\GuideAvailable');
    }
    public function back_suitable(){
        return $this->hasMany('App\GuideSuitable','trip_id')->with('back_trip');
    }
    public function suitable(){
        return $this->hasMany('App\GuideSuitable')->with('suitable_trips');
    }
    public function trips(){
        return $this->hasMany('App\Trip');
    }
    public function guide_request(){
        return $this->hasMany('App\GuideRequest');
    }
}
