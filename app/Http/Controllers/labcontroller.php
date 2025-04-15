<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Dosen;
use App\Models\Riset;
use App\Models\Jabatan;
use App\Models\Pengabdian;
use App\Models\Buku_penulis;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use App\Models\Dosen_jabatan;
use App\Models\Fasilitas;
use App\Models\Fasilitas_lab;
use App\Models\Kegiatan;
use App\Models\Kegiatan_lab;
use App\Models\Mata_kuliah;
use App\Models\Publikasi;
use App\Models\Publikasi_lab;
use Illuminate\Contracts\Database\Eloquent\Builder;

class labcontroller extends Controller
{
    public function show(Request $request)
    {
        // Menangkap id_lab dari permintaan POST
        // $id_lab = $request->input('id_lab');
        $slug = $request->input('slug');
        $lab = Laboratorium::where('slug', $slug)->first();
        $id_lab = $lab->id;
        if (!$lab) {
            return redirect()->back()->with('error', 'Laboratorium tidak ditemukan');
        }
        $jenis_lab = $lab->jenis_lab;
        if($jenis_lab == 'praktikum'){
            $kepalaLaboratorium = Dosen::whereHas("dosen_jabatan", function (Builder $query) use ($id_lab){
                $query->where('id_lab', $id_lab);
            })->first();

            $bulan = now()->month;
            $tahun = now()->year;

            if ($bulan >= 2 && $bulan <= 7) {
                $semester = 'Genap';
                $tahunAjaran = ($tahun - 1);
            } else {
                $semester = 'Ganjil';
                $tahunAjaran = $tahun;
            }
            $matakuliah_lab = Mata_kuliah::where('id_lab', $id_lab)
            ->where('tahun_ajaran_1', strval($tahunAjaran))
            ->where('tahun_ajaran_2', strval($tahunAjaran + 1))
            ->where('semester', $semester)
            ->latest()->get();
            $fasilitas_lab = Fasilitas::with('fasilitas_lab')
            ->whereHas('fasilitas_lab', fn(Builder $query) => $query->where('id_lab', $id_lab))
            ->latest()->get();
            $kegiatan_lab = Kegiatan_lab::with('kegiatan', 'kegiatan_lab_foto')
            ->latest()
            ->where('id_lab', $id_lab)
            ->latest()->get();
            return view('labpraktikum', compact('lab', 'kepalaLaboratorium', 'fasilitas_lab', 'matakuliah_lab', 'kegiatan_lab', 'semester', 'tahunAjaran'));
        }
        
        $buku_lab = Buku::with(['buku_penulis.dosen', 'buku_lab.laboratorium'])
            ->whereHas('buku_lab', fn(Builder $query) => $query->where('id_lab', $id_lab))
            ->latest()->get();
        $riset_lab = Riset::with(['laboratorium', 'dosen'])
            ->whereHas('laboratorium', fn(Builder $query) => $query->where('id', $id_lab))
            ->latest()->get();
        $publikasi_lab = Publikasi::with('publikasi_penulis.dosen')
            ->whereHas('publikasi_penulis.dosen', fn(Builder $query) => $query->where('id_lab', $id_lab))
            ->latest()->get();
        $pengabdian_lab = Pengabdian::where('id_lab', $id_lab)
            ->latest()->get();
        return view('labbidangminat', compact('lab', 'buku_lab', 'riset_lab', 'publikasi_lab', 'pengabdian_lab'));
    }
}
