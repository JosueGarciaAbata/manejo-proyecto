<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;

//TODO: Poner aquí un middleware
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('proposals')->name('proposals.')->group(function () {
        Route::get('/search', [ProposalController::class, 'searchAdmin'])->name('proposals.search');
        Route::get('/search/tag', [ProposalController::class, 'searchByTagAdmin'])->name('proposals.searchByTag');
        Route::get('/search/date', [ProposalController::class, 'searchByDateAdmin'])->name('proposals.searchByDate');
        Route::get('/{id}', [ProposalController::class, 'showAdmin'])->name('proposal.show');
        Route::view('/add-proposal', 'pages.proposals.add-proposal')->name('add-proposal');
        Route::get('/all', [ProposalController::class, 'all'])->name('all');
        Route::get('/edit-proposal', [ProposalController::class, 'edit'])->name('edit-proposal');
        Route::post('/create', [ProposalController::class, 'create'])->name('create');
        Route::post('/update', [ProposalController::class, 'update'])->name('update');
    });
});
