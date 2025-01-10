<?php

use App\Http\Controllers\API;
use App\Http\Middleware\ValidPaddleIPAddress;
use App\Http\Middleware\ValidPaddleSignature;
use Illuminate\Support\Facades\Route;

// Route group for Paddle webhooks
Route::group([
    'prefix' => '/paddle',
    'middleware' => [ValidPaddleIPAddress::class, ValidPaddleSignature::class],
], function () {
    Route::get('/', fn () => 'Paddle!');
    Route::post('/', API\PaddleWebhookController::class);
});
