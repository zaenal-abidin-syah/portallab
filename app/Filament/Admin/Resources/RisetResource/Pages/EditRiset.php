<?php

namespace App\Filament\Admin\Resources\RisetResource\Pages;

use App\Filament\Admin\Resources\RisetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiset extends EditRecord
{
    protected static string $resource = RisetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
