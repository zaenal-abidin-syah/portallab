<?php

namespace App\Models;

use App\Models\Laboratorium;
use App\Models\Dosen;
use App\Models\Dosen_jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $fillable = ['jabatan'];

    public function dosen_jabatan(): HasMany
    {
        return $this->hasMany(Dosen_jabatan::class, 'id_jabatan');
    }

    public function jabatan_lab(): BelongsToMany
    {
        return $this->belongsToMany(Laboratorium::class, 'dosen_jabatan', 'id_jabatan', 'id_lab');
    }

    public function jabatan_dosen(): BelongsToMany
    {
        return $this->belongsToMany(Dosen::class, 'dosen_jabatan', 'id_jabatan', 'id_dosen');
    }

}
