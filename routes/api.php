<?php

use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/vote-statistics', [StatisticsController::class, 'getCompleteVoteStatistics']);


