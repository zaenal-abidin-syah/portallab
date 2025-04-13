<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Pengabdian;
use App\Models\Dosen;
use App\Models\Mata_kuliah;
use App\Models\Riset;
use App\Models\Buku_lab;
use App\Models\Publikasi_lab;
use App\Models\Fasilitas_lab;
use App\Models\Kegiatan_lab;


class Laboratorium extends Model
{
    use HasFactory;
    protected $table = 'laboratorium';
    protected $fillable = ['nama_lab', 'jenis_lab', 'deskripsi'];

    public function pengabdian(): HasMany
    {
        return $this->hasMany(Pengabdian::class, 'id_lab', 'id');
    }

    public function dosen(): HasMany
    {
        return $this->hasMany(Dosen::class, 'id_lab', 'id');
    }

    public function mata_kuliah(): HasMany
    {
        return $this->hasMany(Mata_kuliah::class, 'id_lab', 'id');
    }

    public function riset(): HasMany
    {
        return $this->hasMany(Riset::class, 'id_lab', 'id');
    }

    public function buku_lab(): HasMany
    {
        return $this->hasMany(Buku_lab::class, 'id_lab', 'id');
    }

    public function publikasi_lab(): HasMany
    {
        return $this->hasMany(Publikasi_lab::class, 'id_lab', 'id');
    }

    public function fasilitas_lab(): HasMany
    {
        return $this->hasMany(Fasilitas_lab::class, 'id_lab', 'id');
    }

    public function kegiatan_lab(): HasMany
    {
        return $this->hasMany(Kegiatan_lab::class, 'id_lab', 'id');
    }
}
