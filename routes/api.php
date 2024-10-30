<?php

use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VoterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/vote-statistics', [StatisticsController::class, 'getCompleteVoteStatistics']);

Route::post('/voters/complete-register', [VoterController::class, 'voteParty'])->name('voters.register');


