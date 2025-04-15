<?php

namespace App\Filament\Admin\Resources\DosenResource\Pages;

use App\Filament\Admin\Resources\DosenResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dosen_jabatan;

class CreateDosen extends CreateRecord
{
    protected static string $resource = DosenResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $record = static::getModel()::create($data);
    
        return $record;
    }
    

}
