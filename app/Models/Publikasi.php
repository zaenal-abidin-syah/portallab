<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Publikasi_penulis;
use App\Models\Publikasi_lab;
use App\Models\Dosen;
use App\Models\Laboratorium;


class Publikasi extends Model
{
    use HasFactory;
    protected $table = 'publikasi';
    protected $fillable = ['judul_publikasi', 'tanggal', 'link_scopus', 'link_googleScholar', 'link_sinta'];

    //menambah
    public function publikasi_penulis(): HasMany
    {
        return $this->hasMany(Publikasi_penulis::class, 'id_publikasi', 'id');
    }
    public function publikasi_lab(): HasMany
    {
        return $this->hasMany(Publikasi_lab::class, 'id_publikasi', 'id');
    }

    public function publikasi()
    {
        return $this->belongsToMany(Dosen::class, 'publikasi_penulis', 'id_publikasi', 'id_dosen');
    }

    // untuk menampilkan di form (view)
    public function penulis()
    {
        return $this->belongsToMany(Dosen::class, 'publikasi_penulis', 'id_publikasi', 'id_dosen');
    }

    public function lab()
    {
        return $this->belongsToMany(Laboratorium::class, 'publikasi_lab', 'id_publikasi', 'id_lab');
    }
}
