<?php

namespace App\Listeners;

use App\Events\Paddle\TransactionCompleted;
use App\Facades\Paddle;
use App\Models\License;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAndSendLicense implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(TransactionCompleted $event): void
    {
        // Find the customer
        $customer = Paddle::getCustomer($event->payload['data']['customer_id']);

        // Create the license
        $licenseKey = Str::uuid();
        $license = License::create([
            'email' => $customer['data']['email'],
            'key' => Hash::make($licenseKey),
            'expires_at' => null,
        ]);
    }
}
