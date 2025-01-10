<?php

namespace App\Filament\Actions;

use App\Mail\LicenseCreated;
use App\Models\License;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegenerateLicenseAction extends Action
{
    public static function make(?string $name = null): static
    {
        return parent::make($name)
            ->requiresConfirmation()
            ->modalDescription('Are you sure you want to regenerate the license key? The current license key will stop working and a new one will be created and sent to the license holder.')
            ->action(fn ($record) => RegenerateLicenseAction::regenerate($record));
    }

    /**
     * Generate a new license key and send it to the license holder.
     *
     * @param License $license
     * @return void
     */
    private static function regenerate(License $license) {
        $newLicenseKey = $license->generateAndSaveKey();

        // Send the license
        Mail::to($license->email)->queue(new LicenseCreated(
            licenseEmail: $license->email,
            licenseKey: $newLicenseKey,
        ));

        Notification::make()
            ->title('Done! New license will be sent shortly.')
            ->success()
            ->send();
    }
}
