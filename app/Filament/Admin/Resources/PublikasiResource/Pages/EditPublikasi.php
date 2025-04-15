<?php

namespace App\Filament\Admin\Resources\PublikasiResource\Pages;

use App\Filament\Admin\Resources\PublikasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

use App\Models\Publikasi_lab;
use App\Models\Publikasi_penulis;

class EditPublikasi extends EditRecord
{
    protected static string $resource = PublikasiResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        if (!empty($data['id_lab'])) {
            $idLab = is_array($data['id_lab']) ? (int) reset($data['id_lab']) : (int) $data['id_lab'];

            Publikasi_lab::updateOrCreate(
                ['id_publikasi' => $record->id], 
                ['id_lab' => $idLab]
            );
        }

        if (!empty($data['id_dosen'])) {
            $dosenIds = is_array($data['id_dosen']) ? array_map('intval', $data['id_dosen']) : [(int) $data['id_dosen']];

            Publikasi_penulis::where('id_publikasi', $record->id)->delete();

            foreach ($dosenIds as $dosenId) {
                Publikasi_penulis::create([
                    'id_dosen' => $dosenId,
                    'id_publikasi' => $record->id
                ]);
            }
        }

        return $record;
    }
}
