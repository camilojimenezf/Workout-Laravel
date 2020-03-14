<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    protected $table = 'plans';
    protected $fillable = ['name','price'];
    protected $dates = ['deleted_at'];

    public function athletes()
    {
        return $this->belongsToMany('App\Athlete')->using('App\Subscription');
    }

    public function trainers()
    {
        return $this->belongsToMany('App\Trainer')->using('App\TrainerPlan');
    }
}
