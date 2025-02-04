<?php

namespace App\Filament\Admin\Resources\PublikasiResource\Pages;

use App\Filament\Admin\Resources\PublikasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPublikasis extends ListRecords
{
    protected static string $resource = PublikasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
