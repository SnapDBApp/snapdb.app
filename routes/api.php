<?php

use App\Http\Controllers\API;
use App\Http\Middleware\ValidLicenseClient;
use App\Http\Middleware\ValidPaddleIPAddress;
use App\Http\Middleware\ValidPaddleSignature;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'Nothing to see here.');

// Route group for Paddle webhooks
Route::group([
    'prefix' => '/paddle',
    'middleware' => [ValidPaddleIPAddress::class, ValidPaddleSignature::class],
], function () {
    Route::get('/', fn () => 'Paddle!');
    Route::post('/', API\PaddleWebhookController::class);
});

// Route group for License endpoints
Route::group([
    'prefix' => '/license',
    'middleware' => [ValidLicenseClient::class],
], function () {
    Route::post('register', API\RegisterLicenseController::class);
    Route::post('validate', API\ValidateLicenseController::class);
});
