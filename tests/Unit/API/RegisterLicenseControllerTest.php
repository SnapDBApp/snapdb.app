<?php

use App\Models\Device;
use App\Models\License;

beforeEach(function () {
    Mail::fake();
});

it('returns not_found for licenses that are invalid', function () {
    $response = $this->withHeaders([
        'SnapDB-License-Client' => 1,
    ])->postJson('/api/license/register', [
        'email' => 'john.doe@example.com',
        'key' => 'invalid-key',
        'deviceID' => 'a90c3b34-0688-4a3b-abc9-aeaedcdbc1e4',
        'deviceName' => 'Johns-MacBook-Pro',
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
    ])->postJson('/api/license/register', [
        'email' => $license->email,
        'key' => $rawKey,
        'deviceID' => 'a90c3b34-0688-4a3b-abc9-aeaedcdbc1e4',
        'deviceName' => 'Johns-MacBook-Pro',
    ]);

    $response->assertStatus(410)
        ->assertSee('expired');
});

it('returns max_devices_reached for licenses that already have too many devices', function () {
    $license = License::factory()->create([
        'expires_at' => null,
    ]);
    Device::factory()->count($license->max_devices)->create([
        'license_id' => $license->id,
    ]);
    $rawKey = $license->generateAndSaveKey();

    $response = $this->withHeaders([
        'SnapDB-License-Client' => 1,
    ])->postJson('/api/license/register', [
        'email' => $license->email,
        'key' => $rawKey,
        'deviceID' => 'a90c3b34-0688-4a3b-abc9-aeaedcdbc1e4',
        'deviceName' => 'Johns-MacBook-Pro',
    ]);

    $response->assertStatus(403)
        ->assertSee('max_devices_reached');
});

it('registers a device for a license', function () {
    $license = License::factory()->create([
        'expires_at' => null,
        'max_devices' => 1,
    ]);
    $rawKey = $license->generateAndSaveKey();

    $response = $this->withHeaders([
        'SnapDB-License-Client' => 1,
    ])->postJson('/api/license/register', [
        'email' => $license->email,
        'key' => $rawKey,
        'deviceID' => 'a90c3b34-0688-4a3b-abc9-aeaedcdbc1e4',
        'deviceName' => 'Johns-MacBook-Pro',
    ]);

    $response->assertSuccessful();

    $license->refresh();
    expect($license->devices_count)->toBe(1);
});
