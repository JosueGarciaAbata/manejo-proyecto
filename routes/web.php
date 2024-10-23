<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/candidates', [CandidateController::class, 'show']);

Route::get('/eventsAndNews', [EventController::class, 'index'])->name('events');
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
Route::get('/events/search/tag', [EventController::class, 'searchByTag'])->name('events.searchByTag');
Route::get('/events/search/date', [EventController::class, 'searchByDate'])->name('events.searchByDate');
Route::get('/', [EventController::class, 'latestEvents'])->name('home');


Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');

Route::get('/proposals', function () {
    return view('pages.proposals');
});

Route::get('/suggestions', function () {
    return view('pages.suggestions');
});