<?php

use App\Http\Controllers\StatisticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/vote-statistics', [StatisticsController::class, 'getVoteStatistics']);

