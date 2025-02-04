<?php

namespace App\Filament\Admin\Resources\MataKuliahResource\Pages;

use App\Filament\Admin\Resources\MataKuliahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMataKuliahs extends ListRecords
{
    protected static string $resource = MataKuliahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
