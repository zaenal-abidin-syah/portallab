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
            $buku_lab = new buku_lab();
            $buku_lab->id_lab = $data['id_lab'];
            $buku_lab->id_buku = $record->id;  
            $buku_lab->save();                  
        }

        if (!empty($data['id_dosen']) && is_array($data['id_dosen'])) {
            foreach ($data['id_dosen'] as $dosenId) {
                $buku_penulis = new buku_penulis();
                $buku_penulis->id_dosen = $dosenId;
                $buku_penulis->id_buku = $record->id; 
                $buku_penulis->save();
            }
        }

        return $record;
    }
}
