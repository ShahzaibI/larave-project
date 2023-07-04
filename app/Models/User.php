<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // use HasFactory;
    protected $fillable = ['user_name', 'first_name', 'last_name', 'email_address','phone', 'gender','password'];

    protected $hidden = ['password'];
}
