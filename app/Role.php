<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Userと紐付けたい
    public function users(){
        return $this->hasMany('App\User');
    }
}
