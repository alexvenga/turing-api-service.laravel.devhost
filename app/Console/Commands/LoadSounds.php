<?php

namespace App\Console\Commands;

use App\Models\Word;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

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

        $words = collect(file(storage_path('words.txt')));

        $words->each(function ($word) {
            try {
                if (Word::count()>=30) {
                    return;
                }
                Word::firstOrCreate(['word'=>$word]);
            } catch (\Throwable $e) {
                $this->error($e->getMessage());
            }
        });

        return 0;
    }
}
