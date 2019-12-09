<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klass extends Model
{
    protected $table='jerd_klasses';
    public function teachers()
    {
        return $this->belongsToMany('App\User');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
