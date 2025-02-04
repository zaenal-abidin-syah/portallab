<?php

namespace App\Filament\Admin\Resources\LaboratoriumResource\Pages;

use App\Filament\Admin\Resources\LaboratoriumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaboratorium extends ListRecords
{
    protected static string $resource = LaboratoriumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
