<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VocabController;
use App\Http\Controllers\SentenceController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\FlashcardController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::resource('categories', CategoryController::class);
    Route::resource('vocabs', VocabController::class);
    Route::resource('sentences', SentenceController::class);
    Route::resource('favorites', FavoriteController::class);
    Route::resource('histories', HistoryController::class);

    // Route AI Groq
    Route::get('/generate-sentence/{word}', [AIController::class, 'generateSentence'])
        ->name('generate.sentence');

    // Flashcard Game    
    Route::get('/flashcard', [FlashcardController::class, 'index'])
        ->name('flashcard.index');

    Route::post('/flashcard/check', [FlashcardController::class, 'check'])
        ->name('flashcard.check');

    Route::get('/flashcard/restart', [FlashcardController::class, 'restart'])
        ->name('flashcard.restart');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';