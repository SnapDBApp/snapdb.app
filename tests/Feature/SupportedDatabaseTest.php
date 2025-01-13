<?php

it('can see all databases on the page', function () {
    $databases = config('supported-databases');

    $response = $this->get('/databases')
        ->assertOk();

    foreach ($databases as $database) {
        $response->assertSee($database['name']);
    }
});

it('can view a database detail page', function () {
    $database = collect(config('supported-databases'))->first();

    $response = $this->get('/databases/' . $database['slug'])
        ->assertOk()
        ->assertSee($database['name']);

    foreach ($database['versions'] as $version) {
        $response->assertSee($version);
    }
});

it('cannot view an unknown database detail page', function () {
    $this->get('/databases/dynamodb')
        ->assertNotFound();
});
