<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminManager extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin_managers';

    protected $fillable = [
        'user_info',
        'email',
        'avatar',
        'fullName',
        'password',
        'ma_PIN',
        'vai_tro',
        'describe_vai_tro',
        'hash',
    ];
}
