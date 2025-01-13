<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\Pages\CreateOrder;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        if($form->getOperation() === 'create') 
        {
            return $form
            ->schema([
                // Forms\Components\Select::make('car_id')
                // ->relationship('car', 'model')
                // ->required()
                // ->reactive()
                // ->label('Car')
                // ->afterStateUpdated(fn ($state, callable $set) => 
                //     $set('car_price', Car::find($state)?->price) &&
                //     $set('price', Car::find($state)?->price)
                // ),

                // Forms\Components\TextInput::make('car_price')
                // ->label('Car Price')
                // ->disabled(),

                // Forms\Components\Select::make('user_id')
                // ->label('Select User')
                // ->options(Order::getAllUsers())
                // ->required(),

                // Forms\Components\TextInput::make('duration')
                //     ->label('Duration (Days)')
                //     ->required()
                //     ->numeric()
                //     ->reactive()
                //     ->afterStateUpdated(fn ($state, callable $set, callable $get) => 
                //         $set('total_price', ($get('price') ?? 0) * ($state ?? 0))
                //     ),


                // Forms\Components\TextInput::make('status')
                // ->default('BELUM BAYAR')
                // ->hidden()
                // ->required(),

                // Forms\Components\TextInput::make('total_price')
                // ->label('Total Price')
                // ->required(),
            ]);
        };

        if($form->getOperation() === 'edit') 
        {
            return $form
            ->schema([
                Forms\Components\Select::make('status')
                ->required()
                ->options([
                    'BELUM BAYAR' => 'BELUM BAYAR',
                    'SUDAH BAYAR' => 'SUDAH BAYAR',
                    'DIPROSES' => 'DIPROSES',
                    'SELESAI' => 'SELESAI'
                ]),
            ]);
        }
        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->label('User')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('car.model')
                ->label('Car Model')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make(name: 'duration')->sortable()->searchable(),
                Tables\Columns\TextColumn::make(name: 'total_price')->sortable()->searchable(),
                Tables\Columns\TextColumn::make(name: 'status')->sortable()->searchable(),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
