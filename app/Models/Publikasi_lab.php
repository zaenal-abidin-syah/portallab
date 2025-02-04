<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Laboratorium;
use App\Models\Publikasi;



class Publikasi_lab extends Model
{
    use HasFactory;
    protected $table = 'publikasi_lab';
    protected $fillable = ['id_publikasi', 'id_lab'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'id_lab', 'id');
    }

    public function publikasi(): BelongsTo
    {
        return $this->belongsTo(Publikasi::class, 'id_publikasi', 'id');
    }
}
