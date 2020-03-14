<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = ['athlete_id','weight','height','body_fat'];

    public function athlete()
    {
        return $this->belongsTo('App\Athlete');
    }
}
