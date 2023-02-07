<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{

    protected $fillable = [
        'word',
        'is_sound_loaded',
        'sound_base64',
    ];

    protected $casts = [
        'is_sound_loaded' => 'boolean',
    ];

    public function getAudioAttribute(): string
    {
        return 'data:audio/mp3;base64,'.$this->sound_base64;
    }
}
