<?php

namespace App\Console\Commands;

use App\Models\Word;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class InsertWords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:words';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert words from data/words.txt file';

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

        $words = collect(file(base_path('data/words.txt')));

        $words->each(function ($word) {
            try {
                if (Word::count()>=30) {
                    return;
                }
                $word = Word::firstOrCreate(['word'=>$word]);
            } catch (\Throwable $e) {
                $this->error($e->getMessage());
            }
        });

        return 0;
    }
}
