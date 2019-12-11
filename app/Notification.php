<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table='jerd_notifactions';
    public function comments()
    {
        return $this->hasMany('App\Comment','jerd_comments');
    }

    public function student()
    {
        return $this->belongsTo('App\Student','jerd_students');
    }
    public function klass()
    {
        return $this->belongsTo('App\Klass','jerd_klasses');
    }
    public function user()
    {
        return $this->belongsTo('App\User','jerd_users');
    }
}
