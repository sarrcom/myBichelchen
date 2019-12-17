<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table='jerd_notifications';
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    public function klass()
    {
        return $this->belongsTo('App\Klass');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
