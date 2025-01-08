<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LicenseResource\Pages;
use App\Models\License;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LicenseResource extends Resource
{
    protected static ?string $model = License::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->email()
                    ->required(),

                DateTimePicker::make('expires_at')
                    ->hint('The date the license expires. Leave empty for no expiration.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('Valid')
                    ->getStateUsing(function(License $record) {
                        return $record->isValid();
                    })
                    ->boolean(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('expires_at')
                    ->label('Expires')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLicenses::route('/'),
            'create' => Pages\CreateLicense::route('/create'),
            'edit' => Pages\EditLicense::route('/{record}/edit'),
        ];
    }
}
