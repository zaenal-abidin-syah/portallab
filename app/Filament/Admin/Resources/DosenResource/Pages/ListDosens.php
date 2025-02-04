<?php

namespace App\Filament\Admin\Resources\DosenResource\Pages;

use App\Filament\Admin\Resources\DosenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDosens extends ListRecords
{
    protected static string $resource = DosenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
