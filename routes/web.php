<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/candidates', [CandidateController::class, 'show']);

Route::get('/eventsAndNews', [EventController::class, 'index']);

Route::get('/proposals', function () {
    return view('pages.proposals');
});

Route::get('/suggestions', function () {
    return view('pages.suggestions');
});