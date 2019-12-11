<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{   
    protected $table='jerd_students';
    public function guardians()
    {
        return $this->belongsToMany('App\User','jerd_users');
    }

    public function klass()
    {
        return $this->belongsTo('App\Klass','jerd_klasses');
    }
}
