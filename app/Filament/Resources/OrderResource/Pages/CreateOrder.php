<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $data['total_price'] = ($data['price'] ?? 0) * ($data['duration'] ?? 0);
    //     return $data;
    // }
}
