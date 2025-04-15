<?php

namespace App\Filament\Admin\Resources\DosenResource\Pages;

use App\Filament\Admin\Resources\DosenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dosen_jabatan;

class EditDosen extends EditRecord
{
    protected static string $resource = DosenResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }
}
