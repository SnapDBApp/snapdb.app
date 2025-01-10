<?php

use App\Events\Paddle\TransactionCompleted;
use App\Facades\Paddle;
use App\Listeners\CreateAndSendLicense;
use App\Models\License;

it('fails for invalid customer', function () {
    $event = new TransactionCompleted([
        'data' => [
            'customer_id' => 'ctm_01hv6y1jedq4p1n0yqn5ba3ky4',
        ],
    ]);

    // Mock Paddle getCustomer response
    Paddle::shouldReceive('getCustomer')
        ->with('ctm_01hv6y1jedq4p1n0yqn5ba3ky4')
        ->andThrow(new Exception('Customer not found'));

    // Handle the event
    $listener = new CreateAndSendLicense;
    $listener->handle($event);
})->throws(Exception::class);

it('creates and sends a license', function () {
    $event = new TransactionCompleted([
        'data' => [
            'customer_id' => 'ctm_01hv6y1jedq4p1n0yqn5ba3ky4',
        ],
    ]);

    $customerResponse = ['data' => ['email' => 'mycustomer@example.com']];

    // Mock Paddle getCustomer response
    Paddle::shouldReceive('getCustomer')
        ->with('ctm_01hv6y1jedq4p1n0yqn5ba3ky4')
        ->andReturn($customerResponse);

    // Handle the event
    $listener = new CreateAndSendLicense;
    $listener->handle($event);

    // Expect the license to be created
    $license = License::first();
    expect($license)->not()->toBeNull()
        ->and($license->email)->toBe('mycustomer@example.com')
        ->and($license->expires_at)->toBeNull()
        ->and($license->key)->toBeString();
});
