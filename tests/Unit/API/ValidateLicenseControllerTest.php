<?php

use App\Models\License;

beforeEach(function () {
    Mail::fake();
});

it('returns not_found for licenses that are invalid', function () {
    $response = $this->withHeaders([
        'SnapDB-License-Client' => 1,
    ])->postJson('/api/license/validate', [
        'email' => 'john.doe@example.com',
        'key' => 'invalid-key',
    ]);

    $response->assertStatus(404)
        ->assertSee('A license could not be found with the provided email and key.');
});

it('returns expired for licenses that are expired', function () {
    $license = License::factory()->create([
        'expires_at' => now()->subDay(),
    ]);
    $rawKey = $license->generateAndSaveKey();

    $response = $this->withHeaders([
        'SnapDB-License-Client' => 1,
    ])->postJson('/api/license/validate', [
        'email' => $license->email,
        'key' => $rawKey,
    ]);

    $response->assertStatus(410)
        ->assertSee('expired');
});

it('returns valid for licenses that expire in future', function () {
    $license = License::factory()->create([
        'expires_at' => now()->addDay(),
    ]);
    $rawKey = $license->generateAndSaveKey();

    $response = $this->withHeaders([
        'SnapDB-License-Client' => 1,
    ])->postJson('/api/license/validate', [
        'email' => $license->email,
        'key' => $rawKey,
    ]);

    $response->assertStatus(200)
        ->assertSee('License is valid.');
});

it('returns valid for licenses that never expire', function () {
    $license = License::factory()->create([
        'expires_at' => null,
    ]);
    $rawKey = $license->generateAndSaveKey();

    $response = $this->withHeaders([
        'SnapDB-License-Client' => 1,
    ])->postJson('/api/license/validate', [
        'email' => $license->email,
        'key' => $rawKey,
    ]);

    $response->assertStatus(200)
        ->assertSee('License is valid.');
});
