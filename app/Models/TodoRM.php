<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoRM extends Model
{
    use HasFactory;


    protected $table = 'todo_rms';

    protected $fillable = [
       'content',
       'is_done',
       'id_RM',
    ];
}
