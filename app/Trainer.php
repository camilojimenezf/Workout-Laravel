<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';
    protected $fillable = ['user_id','certification','score','description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function plans()
    {
        return $this->belongsToMany('App\Plan')->using('App\TrainerPlan');
    }
}
