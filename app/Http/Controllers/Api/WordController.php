<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WordResource;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $word = Word::where('is_sound_loaded', true)->inRandomOrder()->firstOrFail();

        return response((new WordResource($word))->toJSON(JSON_UNESCAPED_UNICODE));
    }
}
