<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table='jerd_comments';
    public function notification()
    {
        return $this->belongsTo('App\Notification','jerd_notifications');
    }

    public function user()
    {
        return $this->belongsTo('App\User','jerd_users');
    }
}
