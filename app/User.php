<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard= "users";
	
    protected $fillable = [
        'first_name','last_name','gender','username','email', 'password','phone_number',
        'address','city','country','state',
        'is_social','social_id','social_profile','profile_img',
        'about','activities'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userlogs() {
        return $this->hasMany('App\Userlog');
    }
    
}
