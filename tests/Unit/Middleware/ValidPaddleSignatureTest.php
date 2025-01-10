<?php

use App\Http\Middleware\ValidPaddleSignature;
use Illuminate\Support\Facades\Route;

beforeEach(function () {
    // Note: do not change body content, that will affect the signed signature(s) below
    Route::get('/middleware-test', fn () => 'OK')
        ->middleware(ValidPaddleSignature::class);
});

it('does not allow requests without Paddle-Signature', function () {
    $response = $this->get('/middleware-test');

    expect($response->status())->toBe(401)
        ->and($response->getContent())->toBe('Unauthorized (no signature)');
});

it('does not allow requests with malformed Paddle-Signature', function () {
    $response = $this->withHeaders([
        'Paddle-Signature' => 'random value',
    ])->get('/middleware-test');

    expect($response->status())->toBe(401)
        ->and($response->getContent())->toBe('Unauthorized (invalid signature format)');
});

it('does not allow requests with invalid Paddle-Signature', function () {
    $response = $this->withHeaders([
        'Paddle-Signature' => 'ts=1736437810;h1=22b42079f89a464f1f2e1e69e75979d92d8e34e8ae279ef07ca9b29324a20aea',
    ])->get('/middleware-test');

    expect($response->status())->toBe(401)
        ->and($response->getContent())->toBe('Unauthorized (signature mismatch)');
});

it('allows requests with valid Paddle-Signature', function () {
    config(['paddle.webhook_secret_key' => 'pdl_ntfset_01jh5sjmpybv849xxrvs3g2jgh_LmFJexvXgh4eQ87MfiyO9ngFL03yifWo']);

    $response = $this->withHeaders([
        'Paddle-Signature' => 'ts=1736435182;h1=d604f89a833a2d077d52e6c277af2889fc6faeaadd1264a4960b9daa71b098af',
    ])->get('/middleware-test');

    expect($response->isSuccessful())->toBeTrue()
        ->and($response->getContent())->toBe('OK');
});
