<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    use SoftDeletes;
    protected $table = 'trainers';
    protected $fillable = ['user_id','certification','score','description'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function plans()
    {
        return $this->belongsToMany('App\Plan')->using('App\TrainerPlan');
    }
}
