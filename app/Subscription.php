<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Subscription extends Pivot
{
    /**Subscription es una clase pivot para Atlhete y Plan */
    
    protected $table = 'subscriptions';
    protected $fillable = ['plan_id','athlete_id','enabled','expiration_date'];
    protected $primaryKey = 'subscription_id';
    public $incrementing = true;
}