<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainerPlan extends Pivot
{
    /**TrainerPlan es una clase pivot para Trainer y Plan */
    use SoftDeletes;
    protected $table = 'trainer_plans';
    protected $fillable = ['plan_id','trainer_id'];
    protected $primaryKey = 'trainer_plan_id';
    public $incrementing = true;
    protected $dates = ['deleted_at'];
}