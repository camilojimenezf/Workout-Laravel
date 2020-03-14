<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    protected $table = 'profiles';
    protected $fillable = ['athlete_id','weight','height','body_fat'];
    protected $dates = ['deleted_at'];

    public function athlete()
    {
        return $this->belongsTo('App\Athlete');
    }
}
