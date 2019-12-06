<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
