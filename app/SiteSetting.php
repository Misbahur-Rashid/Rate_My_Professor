<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    public static function getSetting(){
        $categoryID=SiteSetting::where('status',1)->first();
        //$categoryID=json_decode(json_encode($categoryID),true);
        return $categoryID;
    }
}
