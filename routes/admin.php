<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\OrganizationConfigController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;
use App\Http\Middleware\IsAdmin;

//TODO: Poner aquí un middleware
Route::middleware('auth:web')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/home', [AuthorController::class, 'index'])->name('home');
    Route::view('/authors', 'back.pages.authors')->name('authors');
    Route::post('/logout', [AuthorController::class, 'logout'])->name('logout');
    Route::view('/profile', 'back.pages.profile')->name('profile');

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

    Route::prefix('organization')->name('organization.')->group(function () {
        Route::get('/config/show', [OrganizationConfigController::class, 'showConfig'])
    ->name('config.update');

        Route::put('/config/update', [OrganizationConfigController::class, 'updateConfig'])
    ->name('config.update');
    });
    Route::prefix('events')->name('events.')->group(function () {
        Route::view('/add', 'back.pages.add-event')->name('add-event');
        Route::post('/create', [EventController::class, 'createEvent'])->name('create');
        Route::view('/all', 'back.pages.all-events')->name('all-events');
        Route::get('/edit-event', [EventController::class, 'editEvent'])->name('edit-event');
        Route::post('/update-event', [EventController::class, 'updateEvent'])->name('update-event');
    });

    Route::middleware([IsAdmin::class])->group(function () {
        Route::view('/authors', 'back.pages.authors')->name('authors');
        Route::post('/change-profile-picture', [AuthorController::class, 'changeProfilePicture'])->name('change-profile-picture');
        Route::view('/settings', 'back.pages.settings')->name('settings');
    });

});
