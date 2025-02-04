<?php

namespace App\Models;

use App\Models\Laboratorium;
use App\Models\Dosen_jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $fillable = ['jabatan', 'id_lab'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'id_lab', 'id');
    }

    public function dosen_jabatan(): HasMany
    {
        return $this->hasMany(Dosen_jabatan::class, 'id_jabatan', 'id');
    }
}
