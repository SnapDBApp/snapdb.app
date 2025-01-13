<?php

it('has valid config', function () {
    $supportedDatabases = config('supported-databases');

    foreach ($supportedDatabases as $database) {
        expect($database)->toHaveKeys(['slug', 'name', 'description', 'versions'])
            ->and($database['slug'])->toBeLowercase()
            ->and($database['versions'])->toBeArray()
            ->and($database['versions'])->not()->toBeEmpty()
            ->and($database['versions'])->each->toBeString();
    }
});
