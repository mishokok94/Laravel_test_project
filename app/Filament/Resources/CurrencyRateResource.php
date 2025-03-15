<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CurrencyRateResource\Pages;
use App\Models\CurrencyRate;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class CurrencyRateResource extends Resource
{
    protected static ?string $model = CurrencyRate::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Finance';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('base_currency')
                    ->label('Base Currency')
                    ->options([
                        'USD' => 'USD',
                        'EUR' => 'EUR',
                        'MDL' => 'MDL',
                    ])
                    ->searchable()
                    ->required(),

                TextInput::make('target_currency')
                    ->label('Target Currency')
                    ->required()
                    ->maxLength(3),

                // Поле курса обмена
                TextInput::make('rate')
                    ->label('Exchange Rate')
                    ->numeric()
                    ->required(),

                // Дата обновления
                DatePicker::make('fetched_at')
                    ->label('Last Updated')
                    ->default(now()),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('base_currency')->label('Base'),
                TextColumn::make('target_currency')->label('Target'),
                TextColumn::make('rate')->label('Rate')->sortable(),
                TextColumn::make('fetched_at')->label('Fetched At')->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCurrencyRates::route('/'),
            'create' => Pages\CreateCurrencyRate::route('/create'),
            'edit' => Pages\EditCurrencyRate::route('/{record}/edit'),
        ];
    }
}
