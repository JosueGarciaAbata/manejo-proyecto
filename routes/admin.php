<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;

Route::prefix('admin')->name('admin.')->group(function ()   {
    Route::prefix('proposals')->name('proposals.')->group(function () {
        Route::view('/add-proposal','pages.proposals.add-proposal')->name('add-proposal');
        Route::post('/create', [ProposalController::class, 'create'])->name('create');    
    });
});