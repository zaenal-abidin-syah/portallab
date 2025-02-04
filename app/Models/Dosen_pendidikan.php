<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen_pendidikan extends Model
{
    use HasFactory;
    protected $table = 'dosen_pendidikan';
    protected $fillable = ['id_dosen', 'id_jenjang', 'id_univ'];
}
