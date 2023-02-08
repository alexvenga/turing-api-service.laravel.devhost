<?php

use App\Http\Controllers\Api\WordController;
use App\Http\Resources\WordResource;
use App\Models\Word;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})
    ->name('welcome');

Route::get('/preview', function () {
    //$jsonData = \Illuminate\Support\Facades\Http::get(route('api.word'))->body();
    // Not working from localhost
    $word = Word::where('is_sound_loaded', true)->inRandomOrder()->firstOrFail();
    $jsonData = response((new WordResource($word))->toJSON(JSON_UNESCAPED_UNICODE))->getContent();

    $jsonDecoded = json_decode($jsonData);
    return view('preview', compact('jsonData', 'jsonDecoded'));
})
    ->name('preview');
