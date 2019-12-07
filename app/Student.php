<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function guardians()
    {
        return $this->belongsToMany('App\User');
    }

    public function klass()
    {
        return $this->belongsTo('App\Klass');
    }
}
