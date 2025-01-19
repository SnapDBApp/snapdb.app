<?php

beforeEach(function () {
    Route::get('/503', function () {
        abort(503);
    });
});

it('shows custom 503 page', function () {
    $this->get('/503')
        ->assertStatus(503)
        ->assertSee('SnapDB is currently unavailable')
        ->assertSeeHtml(config('app.contact_mail'))
        ->assertSeeHtml(config('app.status_page'));
});
