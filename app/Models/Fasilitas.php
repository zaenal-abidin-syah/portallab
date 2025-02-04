<?php

namespace App\Models;

use App\Models\Laboratorium;
use App\Models\Fasilitas_lab;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $fillable = ['nama_fasilitas'];


    //menambah
    public function fasilitas_lab(): HasMany
    {
        return $this->hasMany(Fasilitas_lab::class, 'id_fasilitas', 'id');
    }

    public function laboratorium()
    {
        return $this->belongsToMany(Laboratorium::class, 'fasilitas_lab', 'id_fasilitas', 'id_lab');
    }
}
