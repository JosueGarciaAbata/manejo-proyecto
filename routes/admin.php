<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;
use App\Models\Proposal;

Route::prefix('admin')->name('admin.')->group(function ()   {
    Route::prefix('proposals')->name('proposals.')->group(function () {
        Route::view('/add-proposal','pages.proposals.add-proposal')->name('add-proposal');
        Route::post('/create', [Proposal::class, 'create'])->name('create');    
    });
});