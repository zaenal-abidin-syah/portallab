<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Riset;
use App\Models\Jabatan;
use App\Models\Pengabdian;
use App\Models\Buku_penulis;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use App\Models\Dosen_jabatan;
use App\Models\Fasilitas_lab;
use App\Models\Publikasi_lab;
use Illuminate\Contracts\Database\Eloquent\Builder;

class labcontroller extends Controller
{
    public function show(Request $request)
    {
        // Menangkap id_lab dari permintaan POST
        $id_lab = $request->input('id_lab');

        $lab = Laboratorium::with(['pengabdian', 'riset', 'buku_lab.buku.buku_penulis.dosen', 'publikasi_lab', 'fasilitas_lab', 'kegiatan_lab', 'mata_kuliah'])->find($id_lab);



        $kepalaLaboratorium = Dosen::with(['laboratorium'])->where('id_lab', $id_lab)
            ->whereHas('dosen_jabatan', function (Builder $query) {
                $query->where('id_jabatan', 2);
            })
            ->first();

        if ($lab) {
            return view('lab', compact('lab', 'kepalaLaboratorium'));
        } else {
            return redirect()->back()->with('error', 'Laboratorium tidak ditemukan');
        }
    }
}
