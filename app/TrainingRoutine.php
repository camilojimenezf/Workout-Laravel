<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingRoutine extends Model
{
    protected $table = 'training_routines';
    protected $fillable = ['training_id','routine_id'];
    protected $primaryKey = 'training_routine_id';
    public $incrementing = true;
}
