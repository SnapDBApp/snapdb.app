<?php

use App\Events\Paddle\TransactionCompleted;
use App\Http\Controllers\API\PaddleWebhookController;

beforeEach(function () {
    Event::fake();
    Route::post('/fake-webhook', PaddleWebhookController::class);
});

it('does not handle invalid request format', function () {
    $response = $this->postJson('/fake-webhook', []);

    $response->assertStatus(422);
});

it('does not dispatch unsupported event types', function ($event) {
    $response = $this->postJson('/fake-webhook', [
        'event_id' => 'evt_01jh5sma5rtx0kkznnp4863f4e',
        'event_type' => $event,
        'occurred_at' => '2025-01-09T15:06:21.752135Z',
        'notification_id' => 'ntf_01jh5smae74wzne60hy18k7n30',
        'data' => [],
    ]);

    $response->assertStatus(400)->assertSee('Unsupported event ' . $event);
})->with(['user.created', 'user.updated']);

it('dispatches TransactionCompleted for event transaction.completed', function () {
    $this->postJson('/fake-webhook', [
        'event_id' => 'evt_01jh5sma5rtx0kkznnp4863f4e',
        'event_type' => 'transaction.completed',
        'occurred_at' => '2025-01-09T15:06:21.752135Z',
        'notification_id' => 'ntf_01jh5smae74wzne60hy18k7n30',
        'data' => [],
    ])->assertOk();

    Event::assertDispatched(TransactionCompleted::class);
});
