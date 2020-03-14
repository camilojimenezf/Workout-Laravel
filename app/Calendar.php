<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendar extends Model
{
    use SoftDeletes;
    protected $table = 'calendars';
    protected $fillable = ['training_id','athlete_id','start','end','observation'];
    protected $dates = ['deleted_at'];
}
