<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table='user_log';
    protected $primaryKey = 'user_id';


    protected $fillable=[
        'device_type','device_token'
    ];
    
    public function user(){
        $this->belongsTo('App\User');
    }
    public function user_log(){
        $this->belongsTo('App\Follow');
    }
}
