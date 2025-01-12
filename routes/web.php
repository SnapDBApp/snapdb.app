<?php

use App\Http\Controllers\ManageLicenseController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('landing');

Route::group([
    'prefix' => 'manage-license',
], function () {
    Route::get('/', [ManageLicenseController::class, 'index'])
        ->name('manage-license');

    Route::post('manage-license/login', [ManageLicenseController::class, 'login'])
        ->name('manage-license.login');

    Route::post('manage-license/logout', [ManageLicenseController::class, 'logout'])
        ->name('manage-license.logout');

    Route::post('manage-license/remove-device', [ManageLicenseController::class, 'removeDevice'])
        ->name('manage-license.remove-device');
});
