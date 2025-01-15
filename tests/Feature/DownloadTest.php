<?php

use App\Facades\GitHub;

it('can open the page', function () {
    GitHub::shouldReceive('getReleases')
        ->once()
        ->andReturn([
            [
                'name' => 'v1.0.0',
                'tag_name' => '1.0.0',
                'published_at' => '2021-01-01',
                'body' => 'Hello, world!',
            ],
        ]);

    $this->get('/downloads')
        ->assertOk();
});

it('can see downloads on the page', function () {
    GitHub::shouldReceive('getReleases')
        ->once()
        ->andReturn([
            [
                'name' => 'v1.0.0',
                'tag_name' => '1.0.0',
                'published_at' => '2021-01-01',
                'body' => 'Plaintext body',
            ],
            [
                'name' => 'v0.1.0',
                'tag_name' => '0.1.0',
                'published_at' => '2020-01-01',
                'body' => '# Amazing release',
            ],
        ]);

    $this->get('/downloads')
        ->assertOk()
        ->assertSee('Plaintext body')
        ->assertSeeHtml('<h1 id="amazing-release">Amazing release</h1>');
});
