<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $table = 'routines';
    protected $fillable = ['title','description','duration','frequency','goal'];

    public function trainings()
    {
        return $this->belongsToMany('App\Training')->using('App\TrainingRoutine');
    }
}
