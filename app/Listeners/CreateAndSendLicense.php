<?php

namespace App\Listeners;

use App\Enums\LicenseOrigin;
use App\Events\Paddle\TransactionCompleted;
use App\Facades\Paddle;
use App\Mail\LicenseCreated;
use App\Models\License;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class CreateAndSendLicense implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(TransactionCompleted $event): void
    {
        // Find the customer
        $customerID = $event->payload['data']['customer_id'];
        $customer = Paddle::getCustomer($customerID);
        $customerEmail = $customer['data']['email'];

        // Create the license
        $license = License::create([
            'email' => $customerEmail,
            'origin' => LicenseOrigin::paddle,
            'expires_at' => null,
            'max_devices' => 2,
            'paddle_customer_id' => $customerID,
            'paddle_transaction_id' => $event->payload['data']['id'],
        ]);
        $licenseKey = $license->generateAndSaveKey();

        // Send the license
        Mail::to($customerEmail)->send(new LicenseCreated(
            licenseEmail: $customerEmail,
            licenseKey: $licenseKey,
        ));
    }
}
