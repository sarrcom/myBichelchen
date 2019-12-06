<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    public function class()
    {
        return $this->belongsTo('App\Class');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
