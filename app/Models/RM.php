<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RM extends Model
{
    use HasFactory;


    protected $table = 'r_m_s';

    protected $fillable = [
        'phase',
        'title',
    ];
}
