<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/candidates', function () {
    return view('candidates.candidates');
});

Route::get('/eventsAndNews', function () {
    return view('eventsAndNews');
});

Route::get('/proposals', function () {
    return view('proposals');
});

Route::get('/suggestions', function () {
    return view('suggestions');
});