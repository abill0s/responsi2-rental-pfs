<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('model')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('brand')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('seat')
                ->required()
                ->numeric(),

                Forms\Components\TextInput::make('price')
                ->label('Price/Day')
                ->required()
                ->numeric(),

                Forms\Components\TextInput::make('year')
                ->required()
                ->numeric()
                ->minValue(1886) // Cars started being manufactured around this time
                ->maxValue(date('Y')),

                Forms\Components\Select::make('fuel')
                ->options([
                    'Bensin' => 'Bensin',
                    'Elektrik' => 'Elektrik',
                ])
                ->default('Bensin'),

                Forms\Components\Select::make('transmission')
                ->required()
                ->options([
                    'Matic' => 'Matic',
                    'Manual' => 'Manual',
                ])
                ->default('Manual'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('model')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('brand')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('price')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('year')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('fuel')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('transmission')->sortable()->searchable(),
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
