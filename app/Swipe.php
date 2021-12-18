<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Swipe extends Model
{
    use Notifiable;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'is_like',
    ];

}
