<?php

namespace App\Listeners;

use App\Events\Paddle\TransactionCompleted;
use App\Facades\Paddle;
use App\Mail\LicenseCreated;
use App\Models\License;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        $customerEmail = $customer['data']['email'];

        // Create the license
        $licenseKey = Str::uuid();
        License::create([
            'email' => $customerEmail,
            'key' => Hash::make($licenseKey),
            'expires_at' => null,
        ]);

        // Send the license
        Mail::to($customerEmail)->send(new LicenseCreated(
            licenseEmail: $customerEmail,
            licenseKey: $licenseKey,
        ));
    }
}
