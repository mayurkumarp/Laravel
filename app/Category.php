<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'user_id','name'
    ];
    protected $hidden = [
        
    ];
    
    public function books(){
        return $this->hasMany('App\Book');
    }
    
}
