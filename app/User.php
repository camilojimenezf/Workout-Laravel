<?php

namespace App;

use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable, SoftDeletes;
    const USUARIO_ADMINISTRADOR = 'ADMIN';
    const USUARIO_ATHLETE = 'ATHLETE';
    const USUARIO_TRAINER = 'TRAINER';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','surname','phone', 'role'
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function athlete()
    {
        return $this->hasOne(Athlete::class);
    }

    public function trainer()
    {
        return $this->hasOne('App\Trainer');
    }



}
