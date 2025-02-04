<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Laboratorium;

class Mata_kuliah extends Model
{
    use HasFactory;
    protected $table = 'mata_kuliah';
    protected $fillable = ['nama_matKul', 'id_lab', 'semester', 'tahun_ajaran_1', 'tahun_ajaran_2'];

    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class, 'id_lab', 'id');
    }
}
