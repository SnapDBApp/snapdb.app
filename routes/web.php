<?php

use App\Http\Controllers\ManageLicenseController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('landing');

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
