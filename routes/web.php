<?php

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
    dd(route('api.word'));
    $jsonData = \Illuminate\Support\Facades\Http::get(route('api.word'))->body();
    $jsonDecoded = json_decode($jsonData);
    return view('preview', compact('jsonData', 'jsonDecoded'));
})
    ->name('preview');
