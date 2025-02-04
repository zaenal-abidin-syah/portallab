<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Kegiatan_lab;



class Kegiatan_lab_foto extends Model
{
    use HasFactory;
    protected $table = 'kegiatan_lab_foto';
    protected $fillable = ['id_kegiatan_lab', 'foto', 'keterangan'];

    public function kegiatan_lab(): BelongsTo
    {
        return $this->belongsTo(Kegiatan_lab::class, 'id_kegiatan_lab', 'id');
    }
}
