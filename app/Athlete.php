<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    protected $table = 'athletes';
    protected $fillable = ['user_id','level','points'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function profiles()
    {
        return $this->hasMany('App\Profile');
    }

    public function plans()
    {
        return $this->belongsToMany('App\Plan')->using('App\Subscription');
    }

}
