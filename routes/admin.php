<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;

//TODO: Poner aquí un middleware
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('proposals')->name('proposals.')->group(function () {
        Route::get('/search', [ProposalController::class, 'searchAdmin'])->name('search');
        Route::view('/add-proposal', 'back.pages.proposals.add-proposal')->name('add-proposal');
        Route::get('/edit-proposal', [ProposalController::class, 'edit'])->name('edit-proposal');
        Route::post('/create', [ProposalController::class, 'create'])->name('create');
        Route::post('/update', [ProposalController::class, 'update'])->name('update');
        Route::post('/hide', [ProposalController::class, 'hide'])->name('hide');
        Route::put('/delete', [ProposalController::class, 'delete'])->name('delete');
    });

    Route::prefix('candidates')->name('candidates.')->group(function () {

        Route::get('/show', [CandidateController::class, 'showAdmin'])->name('show');
        Route::post('/store', [CandidateController::class, 'store'])->name('store');
        Route::put('/update', [CandidateController::class, 'update']);
        Route::put('/destroy', [CandidateController::class, 'destroy']);
    });

    Route::prefix('events')->name('events.')->group(function () {
        Route::view('/add', 'back.pages.add-event')->name('add-event');
        Route::post('/create', [EventController::class, 'createEvent'])->name('create');
        Route::view('/all', 'back.pages.all-events')->name('all-events');
        Route::get('/edit-event', [EventController::class, 'editEvent'])->name('edit-event');
        Route::post('/update-event', [EventController::class, 'updateEvent'])->name('update-event');
    });

    Route::prefix('news')->name('news.')->group(function () {
        Route::view('/add', 'back.pages.add-new')->name('add-new');
        Route::post('/create', [NewsController::class, 'createNew'])->name('create');
        Route::view('/all', 'back.pages.all-news')->name('all-news');
        Route::get('/edit-new', [NewsController::class, 'editNew'])->name('edit-new');
        Route::post('/update-new', [NewsController::class, 'updateNew'])->name('update-new');
    });
});
