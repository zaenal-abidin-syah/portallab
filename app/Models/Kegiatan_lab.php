<?php

namespace App\Models;

use App\Models\Laboratorium;
use App\Models\Kegiatan;
use App\Models\Kegiatan_lab_foto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan_lab extends Model
{
    use HasFactory;
    protected $table = 'kegiatan_lab';
    protected $fillable = ['id_lab', 'id_kegiatan', 'nama_kegiatan', 'tanggal'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'id_lab', 'id');
    }

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan', 'id');
    }

    public function kegiatan_lab_foto(): HasMany
    {
        return $this->hasMany(Kegiatan_lab_foto::class, 'id_kegiatan_lab', 'id');
    }
}
