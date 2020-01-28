<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //Userとの多対多リレーション
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
