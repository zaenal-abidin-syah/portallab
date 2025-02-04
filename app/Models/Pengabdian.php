<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Laboratorium;

class Pengabdian extends Model
{
    use HasFactory;
    protected $table = 'pengabdian';
    protected $fillable = ['judul_pengabdian', 'tanggal', 'id_lab'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'id_lab', 'id');
    }
}
