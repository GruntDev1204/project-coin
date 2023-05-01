<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroduceSndg extends Model
{
    use HasFactory;

    protected $table = 'introduce_sndgs';

    protected $fillable = [
        'content',
        'title_team',
    ];
}
