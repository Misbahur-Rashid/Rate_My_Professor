<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    public function uses(){
        return $this->hasMany('App\User','id','user_id');
    }
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
}
