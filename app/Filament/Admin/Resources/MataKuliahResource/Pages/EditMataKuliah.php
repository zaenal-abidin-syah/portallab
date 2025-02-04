<?php

namespace App\Filament\Admin\Resources\MataKuliahResource\Pages;

use App\Filament\Admin\Resources\MataKuliahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMataKuliah extends EditRecord
{
    protected static string $resource = MataKuliahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
