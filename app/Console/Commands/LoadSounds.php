<?php

namespace App\Console\Commands;

use App\Models\Word;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class LoadSounds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:sounds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load sounds from YandexSpeechKit';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $words = Word::where('is_sound_loaded', false)->get();

        $words->each(function (Word $word) {


            if (Storage::disk('sounds')->exists(Str::slug($word->word) . '.mp3')) {
                $word->update([
                    'is_sound_loaded' => true,
                    'sound_base64'    => base64_encode(Storage::disk('sounds')->get(Str::slug($word->word) . '.mp3')),
                ]);
                return;
            }

            $params = [
                'lang'     => 'ru-RU',
                'voice'    => 'filipp',
                'format'   => 'mp3',
                'text'     => $word->word,
                'folderId' => config('services.yandex.folder_id'),
            ];

            $response = Http::withHeaders([
                'Authorization' => config('services.yandex.authorization_header'),
            ])
                ->asForm()
                ->post('https://tts.api.cloud.yandex.net/speech/v1/tts:synthesize', $params);

            if ($response->status() != 200) {
                $this->error($response->status());
                $this->error($response->body());
                return;
            }

            Storage::disk('sounds')->put(Str::slug($word->word) . '.mp3', $response->body());

            $word->update([
                'is_sound_loaded' => true,
                'sound_base64'    => base64_encode($response->body()),
            ]);

        });

        return 0;
    }
}
