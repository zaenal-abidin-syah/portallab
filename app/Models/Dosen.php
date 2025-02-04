<?php

namespace App\Models;

use App\Models\Buku_penulis;
use App\Models\Laboratorium;
use App\Models\Dosen_jabatan;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $fillable = ['nip', 'nama', 'email', 'jenjang', 'id_lab', 'universitas', 'akun_scopus', 'akun_googleScholar', 'akun_sinta', 'foto'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'id_lab', 'id');
    }

    public function dosen_jabatan(): HasMany
    {
        return $this->hasMany(Dosen_jabatan::class, 'id_dosen', 'id');
    }

    public function buku_penulis(): HasMany
    {
        return $this->hasMany(Buku_penulis::class, 'id_dosen', 'id');
    }

    public function jabatanTerakhir(): HasOne
    {
        return $this->hasOne(Dosen_jabatan::class, 'id_dosen', 'id')->latestOfMany();
    }

    public function jabatanSaatIni(): HasMany
    {
        return $this->hasMany(Dosen_jabatan::class, 'id_dosen', 'id')
            ->where('sampai_tahun', '>=', 2024);  // Hanya yang masa jabatannya masih aktif
    }

    // untuk menampilkan di form (view)
    public function jabatan()
    {
        return $this->belongsToMany(Jabatan::class, 'dosen_jabatan', 'id_dosen', 'id_jabatan');
    }



    public function dosen_jab(): HasOne
    {
        return $this->hasOne(Dosen_jabatan::class, 'id_dosen', 'id');
    }
}
