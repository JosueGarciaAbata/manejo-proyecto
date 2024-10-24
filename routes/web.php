<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/candidates', [CandidateController::class, 'show']);

Route::get('/eventsAndNews', [EventController::class, 'index'])->name('events');
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
Route::get('/events/search/tag', [EventController::class, 'searchByTag'])->name('events.searchByTag');
Route::get('/events/search/date', [EventController::class, 'searchByDate'])->name('events.searchByDate');


Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');

Route::get('/proposals', [ProposalController::class, 'index'])->name('proposals');
Route::get('/proposals/search', [EventController::class, 'search'])->name('proposals.search');
Route::get('/proposals/search/tag', [EventController::class, 'searchByTag'])->name('proposals.searchByTag');
Route::get('/proposals/search/date', [EventController::class, 'searchByDate'])->name('proposals.searchByDate');

Route::get('/proposal/{id}', [EventController::class, 'show'])->name('proposal.show');

Route::get('/suggestions', function () {
    return view('pages.suggestions');
});