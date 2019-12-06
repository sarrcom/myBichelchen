<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function guardians()
    {
        return $this->belongsToMany('App\User');
    }

    public function class()
    {
        return $this->belongsTo('App\ClassModel');
    }
}
