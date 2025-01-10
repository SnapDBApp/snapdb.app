<?php

use App\Http\Middleware\ValidLicenseClient;
use Illuminate\Support\Facades\Route;

beforeEach(function () {
    // Note: do not change body content, that will affect the signed signature(s) below
    Route::get('/middleware-test', fn () => 'OK')
        ->middleware(ValidLicenseClient::class);
});

it('does not allow requests without SnapDB-License-Client header', function () {
    $response = $this->get('/middleware-test');

    expect($response->status())->toBe(401)
        ->and($response->getContent())->toBe('Unauthorized');
});

it('allows requests with SnapDB-License-Client header', function () {
    $response = $this->withHeaders([
        'SnapDB-License-Client' => '1,',
    ])->get('/middleware-test');

    expect($response->isSuccessful())->toBeTrue()
        ->and($response->getContent())->toBe('OK');
});
