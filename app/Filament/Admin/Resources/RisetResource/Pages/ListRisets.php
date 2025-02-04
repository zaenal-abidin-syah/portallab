<?php

namespace App\Filament\Admin\Resources\RisetResource\Pages;

use App\Filament\Admin\Resources\RisetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRisets extends ListRecords
{
    protected static string $resource = RisetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
