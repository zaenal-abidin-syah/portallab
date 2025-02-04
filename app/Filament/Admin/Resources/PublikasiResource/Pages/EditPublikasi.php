<?php

namespace App\Filament\Admin\Resources\PublikasiResource\Pages;

use App\Filament\Admin\Resources\PublikasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

use App\Models\publikasi_lab;
use App\Models\publikasi_penulis;

class EditPublikasi extends EditRecord
{
    protected static string $resource = PublikasiResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

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
