<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function students()
    {
        return $this->belongsToMany('App\Students');
    }

    public function klasss()
    {
        return $this->belongsToMany('App\Klass');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function guardians()
    {
        return $this->hasMany('App\Notification');
    }
}
