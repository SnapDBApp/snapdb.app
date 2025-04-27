<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\SupportedDatabaseController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('landing');
Route::view('terms', 'legal.terms-conditions')->name('terms-conditions');
Route::view('returns', 'legal.returns-policy')->name('returns-policy');
Route::view('privacy', 'legal.privacy-policy')->name('privacy-policy');
Route::get('downloads', DownloadController::class)->name('downloads');
Route::get('contact', [ContactController::class, 'index'])->name('contact');

Route::group([
    'prefix' => 'databases',
], function () {
    Route::get('/', [SupportedDatabaseController::class, 'index'])
        ->name('supported-databases');

    Route::get('{slug}', [SupportedDatabaseController::class, 'show'])
        ->name('supported-databases.show');
});
