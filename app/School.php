<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table='jerd_schools';
    public function klasss(){
        return $this->hasMany('App\Klass','jerd_klasses');
    }
    public function guardians()
    {
        return $this->hasMany('App\Admin','jerd_admins');
    }
}
