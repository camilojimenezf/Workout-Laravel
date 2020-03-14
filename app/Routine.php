<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Routine extends Model
{
    use SoftDeletes;
    protected $table = 'routines';
    protected $fillable = ['trainer_id','title','description','duration','frequency','goal'];
    protected $dates = ['deleted_at'];

    public function trainings()
    {
        return $this->belongsToMany('App\Training')->using('App\TrainingRoutine');
    }
}
