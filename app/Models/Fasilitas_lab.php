<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Laboratorium;
use App\Models\Fasilitas;



class Fasilitas_lab extends Model
{
    use HasFactory;
    protected $table = 'fasilitas_lab';
    protected $fillable = ['id_fasilitas', 'id_lab', 'jumlah'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'id_lab', 'id');
    }

    public function fasilitas(): BelongsTo
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas', 'id');
    }
}
