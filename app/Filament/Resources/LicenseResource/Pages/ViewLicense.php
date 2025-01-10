<?php

namespace App\Filament\Resources\LicenseResource\Pages;

use App\Filament\Actions\RegenerateLicenseAction;
use App\Filament\Resources\LicenseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLicense extends ViewRecord
{
    protected static string $resource = LicenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            RegenerateLicenseAction::make('Regenerate License'),
        ];
    }
}
