<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class Book extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'user_id','author_id','category_id','name','author','price','qty','cover','pdf'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    public function rates() {
        return $this->hasMany('App\Rate');
    }
    public function author() {
        return $this->belongsTo('App\Author');
    }
    public function category() {
        return $this->belongsTo('App\Category');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}
