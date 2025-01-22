<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ManageLicenseController;
use App\Http\Controllers\SupportedDatabaseController;
use Illuminate\Support\Facades\Route;

// Cached routes
Route::middleware('cache.headers:public;max_age=86400;etag')->group(function () {
    Route::view('/', 'landing')->name('landing');
    Route::view('terms', 'legal.terms-conditions')->name('terms-conditions');
    Route::view('returns', 'legal.returns-policy')->name('returns-policy');
    Route::view('privacy', 'legal.privacy-policy')->name('privacy-policy');
    Route::get('downloads', DownloadController::class)->name('downloads');
    Route::get('contact', [ContactController::class, 'index'])->name('contact');
    Route::post('contact', [ContactController::class, 'sendMessage']);

    Route::group([
        'prefix' => 'databases',
    ], function () {
        Route::get('/', [SupportedDatabaseController::class, 'index'])
            ->name('supported-databases');

        Route::get('{slug}', [SupportedDatabaseController::class, 'show'])
            ->name('supported-databases.show');
    });
});

Route::group([
    'prefix' => 'manage-license',
], function () {
    Route::get('/', [ManageLicenseController::class, 'index'])
        ->name('manage-license');

    Route::post('login', [ManageLicenseController::class, 'login'])
        ->name('manage-license.login')
        ->middleware('throttle:10,1'); // 10 requests per minute

    Route::post('logout', [ManageLicenseController::class, 'logout'])
        ->name('manage-license.logout');

    Route::post('remove-device', [ManageLicenseController::class, 'removeDevice'])
        ->name('manage-license.remove-device');
});
