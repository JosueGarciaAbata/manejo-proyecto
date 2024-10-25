<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/candidates', [CandidateController::class, 'show'])->name('candidatos');
Route::get('/candidate/{id}', [CandidateController::class, 'candidate'])->name('candidate');

Route::get('/eventsAndNews', [EventController::class, 'index'])->name('events');
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
Route::get('/events/search/tag', [EventController::class, 'searchByTag'])->name('events.searchByTag');
Route::get('/events/search/date', [EventController::class, 'searchByDate'])->name('events.searchByDate');


Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');

Route::get('/proposals', [ProposalController::class, 'index'])->name('proposals');
Route::get('/proposals/search', [ProposalController::class, 'search'])->name('proposals.search');
Route::get('/proposals/search/tag', [ProposalController::class, 'searchByTag'])->name('proposals.searchByTag');
Route::get('/proposals/search/date', [ProposalController::class, 'searchByDate'])->name('proposals.searchByDate');

Route::get('/proposal/{id}', [ProposalController::class, 'show'])->name('proposal.show');

Route::get('/suggestions', [SuggestionController::class,'index'])->name('suggestions.index');

Route::post('/suggestions',[SuggestionController::class,'store'])->name('suggestions.store');

Route::get('/voters/complete-register',[VoterController::class,'create'])->name('voters.complete-register');

Route::post('/voters/complete-register',[VoterController::class,'store'])->name('voters.register');

Route::get('/poll', [VoteController::class, 'show'])->name('poll');