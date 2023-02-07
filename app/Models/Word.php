<?php

namespace App\Models;

use Gregwar\Captcha\CaptchaBuilder;
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

    public function getTextAttribute(): string
    {
        return $this->word;
    }

    public function getAudioAttribute(): string
    {
        return $this->sound_base64;
    }

    public function getImageAttribute(): string
    {
        return $this->getImageString();
    }

    protected function getImageString(): string
    {

        $captcha = new CaptchaBuilder($this->word);
        $text = $captcha->setIgnoreAllEffects(false)
            ->setMaxBehindLines(3)
            ->setMaxFrontLines(3)
            ->build(300,100, storage_path('fonts/podkova.ttf'))->inline();

        $text = preg_replace('/^data\:image\/jpeg\;base64\,/ui', '', $text);

        return $text;
    }
}
