<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingRoutine extends Model
{
    use SoftDeletes;

    protected $table = 'training_routines';
    protected $fillable = ['training_id','routine_id'];
    protected $primaryKey = 'training_routine_id';
    public $incrementing = true;
    protected $dates = ['deleted_at'];
}
