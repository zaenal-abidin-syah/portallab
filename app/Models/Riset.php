<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Laboratorium;
use App\Models\Dosen;


class Riset extends Model
{
    use HasFactory;
    protected $table = 'riset';
    protected $fillable = ['judul_riset', 'id_lab', 'id_dosen', 'tahun'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'id_lab', 'id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
}
