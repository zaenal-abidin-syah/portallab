<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\Dosen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku_penulis extends Model
{
    use HasFactory;
    protected $table = 'buku_penulis';
    protected $fillable = ['id_dosen', 'id_buku'];

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}
