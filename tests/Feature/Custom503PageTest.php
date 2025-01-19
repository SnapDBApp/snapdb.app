<?php

it('shows custom 503 page', function () {
    Artisan::call('down');

    $this->get('/')
        ->assertStatus(503)
        ->assertSee('SnapDB is currently unavailable')
        ->assertSeeHtml(config('app.contact_mail'))
        ->assertSeeHtml(config('app.status_page'));
});
