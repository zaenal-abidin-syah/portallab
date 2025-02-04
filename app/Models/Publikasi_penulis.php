<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Publikasi;
use App\Models\Dosen;



class Publikasi_penulis extends Model
{
    use HasFactory;
    protected $table = 'publikasi_penulis';
    protected $fillable = ['id_publikasi', 'id_dosen'];

    public function publikasi(): BelongsTo
    {
        return $this->belongsTo(Publikasi::class, 'id_publikasi', 'id');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
}
