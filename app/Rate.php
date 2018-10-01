<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class Rate extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','book_id','rate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
