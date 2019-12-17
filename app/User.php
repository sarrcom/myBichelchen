<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='jerd_users';
    public $timestamps = false;
    public function students()
    {
        return $this->belongsToMany('App\Student', 'jerd_responsible_of_students');
    }

    public function klasses()
    {
        return $this->belongsToMany('App\Klass', 'jerd_teachers_klasses');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }
}
