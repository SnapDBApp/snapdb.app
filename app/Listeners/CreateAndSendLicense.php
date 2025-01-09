<?php

namespace App\Listeners;

use App\Events\Paddle\TransactionCompleted;
use App\Models\License;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAndSendLicense implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(TransactionCompleted $event): void
    {
        $licenseKey = Str::uuid();
        $license = License::create([
//            'email' => $event->payload['data']['email'],
            'email' => 'idk@gmail.com',
            'key' => Hash::make($licenseKey),
            'expires_at' => null,
        ]);
    }
}
