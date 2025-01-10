<?php

use App\Http\Middleware\ValidPaddleIPAddress;
use Illuminate\Support\Facades\Route;

beforeEach(function () {
    Route::get('/middleware-test', fn () => 'OK')
        ->middleware(ValidPaddleIPAddress::class);
});

it('does not allow requests from unknown IPs', function () {
    $this->withServerVariables(['REMOTE_ADDR' => '142.250.179.206']);
    $response = $this->get('/middleware-test');

    expect($response->status())->toBe(401)
        ->and($response->getContent())->toBe('Unauthorized (blocked IP address 142.250.179.206)');
});

it('allows requests from valid IPs', function () {
    foreach (config('paddle.ip-whitelist') as $validIP) {
        $this->withServerVariables(['REMOTE_ADDR' => $validIP]);
        $response = $this->get('/middleware-test');

        expect($response->isSuccessful())->toBeTrue()
            ->and($response->getContent())->toBe('OK');
    }
});
