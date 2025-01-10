<?php

namespace App\Filament\Actions;

use App\Enums\LicenseOrigin;
use App\Mail\LicenseCreated;
use App\Models\License;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Mail;

class GenerateLicenseAction extends Action
{
    public static function make(?string $name = 'Generate License'): static
    {
        return parent::make($name)
            ->modalDescription('Please fill in the information below to generate a new license. The license will be sent to the email address provided.')
            ->form([
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                DateTimePicker::make('expires_at')
                    ->label('Expiry'),
            ])
            ->action(fn (array $data) => GenerateLicenseAction::generate($data));
    }

    /**
     * Generate a new license key and send it to the license holder.
     *
     * @return void
     */
    private static function generate(array $data)
    {
        $license = License::create([
            'email' => $data['email'],
            'origin' => LicenseOrigin::manual,
            'expires_at' => $data['expires_at'],
        ]);

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
