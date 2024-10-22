<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/candidates', [CandidateController::class, 'show']);

Route::get('/eventsAndNews', [EventController::class, 'index'])->name('events');

Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');

Route::get('/proposals', function () {
    return view('pages.proposals');
});

Route::get('/suggestions', [SuggestionController::class,'index']);