<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    Const VIP_USERS = 33;
    protected $table = 'rm_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'comblimit',
        'firstname',
        'lastname',
        'email',
        'srvid', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public static function getCheckBalanceValidation () {
        return [
            'username' => 'required|string',
            'password' => 'required|string'
        ];
    }

    public static function getUpdatePasswordValidation () {
        return [
            'username' => 'required|string',
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_password' => 'required|string'
        ];
    }
}
