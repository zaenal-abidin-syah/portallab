<?php

namespace App\Filament\Admin\Resources\KegiatanLabResource\Pages;

use App\Filament\Admin\Resources\KegiatanLabResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKegiatanLab extends EditRecord
{
    protected static string $resource = KegiatanLabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
