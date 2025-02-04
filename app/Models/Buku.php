<?php

namespace App\Models;

use App\Models\Buku_penulis;
use App\Models\Buku_lab;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = ['isbn', 'judul_buku', 'tanggal', 'kota'];

    public function buku_penulis(): HasMany
    {
        return $this->hasMany(Buku_penulis::class, 'id_buku', 'id');
    }
    public function buku_lab(): HasMany
    {
        return $this->hasMany(Buku_lab::class, 'id_buku', 'id');
    }

    // untuk menampilkan di form (view)
    public function penulis()
    {
        return $this->belongsToMany(Dosen::class, 'buku_penulis', 'id_buku', 'id_dosen');
    }

    public function lab()
    {
        return $this->belongsToMany(Laboratorium::class, 'buku_lab', 'id_buku', 'id_lab');
    }
}
