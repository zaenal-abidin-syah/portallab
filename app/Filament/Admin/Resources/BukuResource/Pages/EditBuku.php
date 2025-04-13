<?php

namespace App\Filament\Admin\Resources\BukuResource\Pages;

use App\Filament\Admin\Resources\BukuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

use App\Models\buku_lab;
use App\Models\buku_penulis;


class EditBuku extends EditRecord
{
    protected static string $resource = BukuResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        if (!empty($data['id_lab'])) {
            $idLab = is_array($data['id_lab']) ? (int) reset($data['id_lab']) : (int) $data['id_lab'];

            buku_lab::updateOrCreate(
                ['id_buku' => $record->id], 
                ['id_lab' => $idLab]
            );
        }

        if (!empty($data['id_dosen'])) {
            $dosenIds = is_array($data['id_dosen']) ? array_map('intval', $data['id_dosen']) : [(int) $data['id_dosen']];

            buku_penulis::where('id_buku', $record->id)->delete();

            foreach ($dosenIds as $dosenId) {
                buku_penulis::create([
                    'id_dosen' => $dosenId,
                    'id_buku' => $record->id
                ]);
            }
        }

        return $record;
    }


}
