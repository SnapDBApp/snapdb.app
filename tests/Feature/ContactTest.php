<?php

use App\Mail\ContactMessageReceived;

it('can open contact page')
    ->get('/contact')
    ->assertOk();

it('can send a contact message with company', function () {
    Mail::fake();

    $this->post('/contact', [
        'cf-turnstile-response' => 'this-is-a-test',
        'name' => 'John Doe',
        'company' => 'Acme Inc.',
        'email' => 'john.doe@example.com',
        'message' => 'Hello, I have a question.',
    ]);

    Mail::assertQueued(ContactMessageReceived::class, function ($mail) {
        return $mail->hasTo(config('app.contact_mail'));
    });
});

it('can send a contact message without company', function () {
    Mail::fake();

    $this->post('/contact', [
        'cf-turnstile-response' => 'this-is-a-test',
        'name' => 'John Doe',
        'company' => '.',
        'email' => 'john.doe@example.com',
        'message' => 'Hello, I have a question.',
    ]);

    Mail::assertQueued(ContactMessageReceived::class, function ($mail) {
        return $mail->hasTo(config('app.contact_mail'));
    });
});

it('can send a contact message with long message', function () {
    Mail::fake();

    $this->post('/contact', [
        'cf-turnstile-response' => 'this-is-a-test',
        'name' => 'John Doe',
        'company' => '.',
        'email' => 'john.doe@example.com',
        'message' => fake()->paragraphs(5, true),
    ]);

    Mail::assertQueued(ContactMessageReceived::class, function ($mail) {
        return $mail->hasTo(config('app.contact_mail'));
    });
});
