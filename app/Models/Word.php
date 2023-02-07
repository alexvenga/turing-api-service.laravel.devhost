<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{

    protected $fillable = [
        'word',
        'sound_base64',
    ];
}
