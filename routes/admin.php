<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;

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
    });
});
