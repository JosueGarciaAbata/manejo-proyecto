<?php

use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/candidates', [CandidateController::class, 'show']);

Route::get('/eventsAndNews', function () {
    return view('pages.eventsAndNews');
});

Route::get('/proposals', function () {
    return view('pages.proposals');
});

Route::get('/suggestions', function () {
    return view('pages.suggestions');
});