<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

//use Illuminate\Database\Eloquent\Model;

class usuario extends Authenticatable
{
    use Notifiable;
    
    public $timestamps = false; 

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token'
    ];
}