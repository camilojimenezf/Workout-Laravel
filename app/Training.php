<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use SoftDeletes;
    protected $table = 'trainings';
    protected $fillable = ['title','description','duration'];
    protected $dates = ['deleted_at'];

    public function athletes()
    {
        return $this->belongsToMany('App\Athlete')->using('App\Calendar');
    }

    public function routines()
    {
        return $this->belongsToMany('App\Routine')->using('App\TrainingRoutine');
    }
}
