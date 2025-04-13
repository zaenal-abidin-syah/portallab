<?php

namespace App\Models;

use App\Models\Dosen;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen_jabatan extends Model
{
    use HasFactory;
    protected $table = 'dosen_jabatan';
    protected $fillable = ['id_dosen', 'id_jabatan', 'dari_tahun', 'sampai_tahun', 'id_lab'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'id_lab', 'id');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id');
    }
}
