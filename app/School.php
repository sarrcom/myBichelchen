<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function classes(){
        return $this->hasMany('App\ClassModel');
    }
    public function guardians()
    {
        return $this->hasMany('App\Admin');
    }
}
