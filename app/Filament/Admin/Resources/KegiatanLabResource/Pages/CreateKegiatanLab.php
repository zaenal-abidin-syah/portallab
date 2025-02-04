<?php

namespace App\Filament\Admin\Resources\KegiatanLabResource\Pages;

use App\Filament\Admin\Resources\KegiatanLabResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

use App\Models\kegiatan_lab_foto;

class CreateKegiatanLab extends CreateRecord
{
    protected static string $resource = KegiatanLabResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $record = static::getModel()::create($data);
    
        return $record;
    }
}
