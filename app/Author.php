<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'user_id','name','city','about'
    ];
    protected $hidden = [
        
    ];
    
    public function books(){
        return $this->hasMany('App\Book');
    }
    
}
