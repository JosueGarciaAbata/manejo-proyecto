<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\VoterController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;

Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/candidates', [CandidateController::class, 'candidates'])->name('candidates');
Route::get('/candidate/{id}', [CandidateController::class, 'candidate'])->name('candidate');
Route::post('/candidates', [VoterController::class, 'vote'])->name('vote.store');
Route::get('/candidates/admin', [CandidateController::class, 'admin']);
Route::post('/candidates/admin/store', [CandidateController::class, 'store']);
Route::put('/candidates/admin/update', [CandidateController::class, 'update']);
Route::put('/candidates/admin/destroy', [CandidateController::class, 'destroy']);

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
Route::get('/events/search/tag', [EventController::class, 'searchByTag'])->name('events.searchByTag');
Route::get('/events/search/date', [EventController::class, 'searchByDate'])->name('events.searchByDate');
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/search', [NewsController::class, 'search'])->name('news.search');
Route::get('/news/search/tag', [NewsController::class, 'searchByTag'])->name('news.searchByTag');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/proposals', [ProposalController::class, 'index'])->name('proposals');
Route::get('/proposals/search', [ProposalController::class, 'search'])->name('proposals.search');
Route::get('/proposals/search/tag', [ProposalController::class, 'searchByTag'])->name('proposals.searchByTag');
Route::get('/proposals/search/date', [ProposalController::class, 'searchByDate'])->name('proposals.searchByDate');
Route::get('/proposal/{id}', [ProposalController::class, 'show'])->name('proposal.show');

Route::get('/suggestions', [SuggestionController::class, 'index'])->name('suggestions.index');
Route::post('/suggestions', [SuggestionController::class, 'store'])->name('suggestions.store');

Route::get('/voters/complete-register', [VoterController::class, 'create'])->name('voters.complete-register');

Route::post('/voters/complete-register', [VoterController::class, 'store'])->name('voters.add-voter-data');

Route::get('/voters/statistics', function () {
    return view('pages.statistics');
})->name('statistics');


Route::get('/login', function () {
    return view('back.pages.auth.login');
})->name('login');




//Nota: aun me falta realizar algunos cambios y cambiar el nombre de unas variables de unos archivos que tiene tipo  author en vez de admin.

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:web'])->group(function () {
        Route::view('/login', 'back.pages.auth.login')->name('login');
    });

    Route::view('/front', 'front.pages.home')->name('front');


    Route::post('/change-profile-picture', [AuthorController::class, 'changeProfilePicture'])->name('change-profile-picture');
    Route::view('/settings', 'back.pages.settings')->name('settings');
    Route::view('/categories', 'back.pages.categories')->name('categories');
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/home', [AuthorController::class, 'index'])->name('home');
        Route::view('/authors', 'back.pages.authors')->name('authors');
        Route::post('/logout', [AuthorController::class, 'logout'])->name('logout');
        Route::view('/profile', 'back.pages.profile')->name('profile');

    });

    Route::middleware([isAdmin::class])->group(function () {
        Route::view('/authors', 'back.pages.authors')->name('authors');
        Route::post('/change-profile-picture', [AuthorController::class, 'changeProfilePicture'])->name('change-profile-picture');
        Route::view('/settings', 'back.pages.settings')->name('settings');
    });

});