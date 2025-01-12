<?php

namespace App\Filament\Resources;

use App\Filament\Actions\GenerateLicenseAction;
use App\Filament\Resources\LicenseResource\Pages\ListLicenses;
use App\Filament\Resources\LicenseResource\Pages\ViewLicense;
use App\Filament\Resources\LicenseResource\RelationManagers\DevicesRelationManager;
use App\Models\License;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
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
                Section::make('General')
                    ->columns()
                    ->schema([
                        TextInput::make('origin')
                            ->required(),

                        TextInput::make('email')
                            ->email()
                            ->required(),

                        DateTimePicker::make('expires_at')
                            ->hint('The date the license expires. Empty for no expiration.'),

                        TextInput::make('key_first_part')
                            ->label('Key')
                            ->hint('First part of the license key.')
                            ->formatStateUsing(function (License $record) {
                                return $record->key_first_part . '*****';
                            }),
                    ]),

                Section::make('Paddle')
                    ->columns()
                    ->schema([
                        TextInput::make('paddle_customer_id')
                            ->label('Customer ID (Paddle)'),

                        TextInput::make('paddle_transaction_id')
                            ->label('Transaction ID (Paddle)'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('Valid')
                    ->getStateUsing(function (License $record) {
                        return $record->isValid();
                    })
                    ->boolean(),

                TextColumn::make('key_first_part')
                    ->getStateUsing(function (License $record) {
                        return $record->key_first_part . '*****';
                    })
                    ->label('Key')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('expires_at')
                    ->label('Expires')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('last_seen_at')
                    ->label('Last Seen')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('paddle_customer_id')
                    ->label('Customer ID (Paddle)')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('paddle_transaction_id')
                    ->label('Transaction ID (Paddle)')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
            ])
            ->headerActions([
                GenerateLicenseAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [
            DevicesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLicenses::route('/'),
            'view' => ViewLicense::route('/{record}'),
        ];
    }
}
