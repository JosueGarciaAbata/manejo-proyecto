<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\VoterController;
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

Route::get('/suggestions', [SuggestionController::class,'index'])->name('suggestions.index');

Route::post('/suggestions',[SuggestionController::class,'store'])->name('suggestions.store');

Route::get('/voters/complete-register',[VoterController::class,'create'])->name('voters.complete-register');

Route::post('/voters/complete-register',[VoterController::class,'store'])->name('voters.register');