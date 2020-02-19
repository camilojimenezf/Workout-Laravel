<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';
    protected $fillable = ['name','price'];

    public function athletes()
    {
        return $this->belongsToMany('App\Athlete')->using('App\Subscription');
    }

    public function trainers()
    {
        return $this->belongsToMany('App\Trainer')->using('App\TrainerPlan');
    }
}
