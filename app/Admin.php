<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='jerd_admins';
    public function school()
    {
        return $this->belongsTo('App\School','jerd_schools');
    }
}
