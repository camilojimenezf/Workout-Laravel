<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';
    protected $fillable = ['title','description','duration'];

    public function athletes()
    {
        return $this->belongsToMany('App\Athlete')->using('App\Calendar');
    }

    public function routines()
    {
        return $this->belongsToMany('App\Routine')->using('App\TrainingRoutine');
    }
}
