<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function school(){
        return $this->belongsTo('App\School');
    }

    public static function getTeacher(){

        $getTeacherId=Teacher::with('department')->where('status',1)->take(15)->latest()->get();
        $getTeacherId=json_decode(json_encode($getTeacherId),true);
        return $getTeacherId;
    }

}
