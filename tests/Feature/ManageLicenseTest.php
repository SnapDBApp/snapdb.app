<?php

use App\Models\Device;
use App\Models\License;

it('can access the manage license page', function () {
    $this->get('/manage-license')
        ->assertOk();
});

it('sees an error when logging in with wrong license credentials', function () {
    $this->post('manage-license/login', [
        'email' => 'test@example.com',
        'key' => 'wrong-key',
    ])
        ->assertRedirect()
        ->assertSessionHasErrors(['email']);
});

it('can login', function () {
    $license = License::factory()->create(['email' => 'test@example.com']);
    $key = $license->generateAndSaveKey();

    $this->followingRedirects()->post('manage-license/login', [
        'email' => 'test@example.com',
        'key' => $key,
    ])
        ->assertSessionHasNoErrors()
        ->assertSee($license->email);
});

it('rate limits login attempts', function () {
    $maxPerMinute = 10;

    for ($i = 0; $i < $maxPerMinute; $i++) {
        $this->post('manage-license/login', [
            'email' => 'test@example.com',
            'key' => 'wrong-key',
        ]);
    }

    $this->post('manage-license/login', [
        'email' => 'test@example.com',
        'key' => 'wrong-key',
    ])
        ->assertStatus(429);
});

it('can logout', function () {
    $license = License::factory()->create(['email' => 'test@example.com']);
    session()->put('managing_license_id', $license->id);

    $this->post('manage-license/logout')
        ->assertRedirect();

    expect(session('managing_license_id'))->toBeNull();
});

it('sees registered devices on the page', function () {
    $license = License::factory()->create(['email' => 'test@example.com']);
    $devices = Device::factory(3)->create(['license_id' => $license->id]);
    session()->put('managing_license_id', $license->id);

    $response = $this->get('manage-license')
        ->assertOk();

    foreach ($devices as $device) {
        $response->assertSee($device->name);
    }
});

it('can remove a device', function () {
    $license = License::factory()->create(['email' => 'test@example.com']);
    $device = Device::factory()->create(['license_id' => $license->id]);
    session()->put('managing_license_id', $license->id);

    expect($license->devices()->count())->toBe(1);

    $this->post('manage-license/remove-device', ['id' => $device->id])
        ->assertRedirect();

    expect($license->devices()->count())->toBe(0);
});

it('cannot remove an unrelated device', function () {
    $license = License::factory()->create(['email' => 'test@example.com']);
    $otherDevice = Device::factory()->create();
    session()->put('managing_license_id', $license->id);

    $this->post('manage-license/remove-device', ['id' => $otherDevice->id])
        ->assertNotFound();
});
