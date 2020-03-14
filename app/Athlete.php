<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Athlete extends Model
{
    use SoftDeletes;
    protected $table = 'athletes';
    protected $fillable = ['user_id','level','points'];
    protected $dates = ['deleted_at'];

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

    public function trainings()
    {
        return $this->belongsToMany('App\Training')->using('App\Calendar');
    }

}
