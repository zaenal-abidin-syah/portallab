<?php

namespace App\Filament\Admin\Resources\PublikasiResource\Pages;

use App\Filament\Admin\Resources\PublikasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

use App\Models\publikasi_lab;
use App\Models\publikasi_penulis;

class CreatePublikasi extends CreateRecord
{
    protected static string $resource = PublikasiResource::class;

    
    protected function handleRecordCreation(array $data): Model
    {
        $record = static::getModel()::create($data);

        if (!empty($data['id_lab'])) {
            $publikasi_lab = new publikasi_lab();
            $publikasi_lab->id_lab = $data['id_lab'];
            $publikasi_lab->id_publikasi = $record->id;  
            $publikasi_lab->save();                  
        }

        if (!empty($data['id_dosen']) && is_array($data['id_dosen'])) {
            foreach ($data['id_dosen'] as $dosenId) {
                $publikasi_penulis = new publikasi_penulis();
                $publikasi_penulis->id_dosen = $dosenId;
                $publikasi_penulis->id_publikasi = $record->id; 
                $publikasi_penulis->save();
            }
        }

        return $record;
    }
}
