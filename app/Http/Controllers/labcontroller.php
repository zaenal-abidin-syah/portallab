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

        // $lab = Laboratorium::with(['pengabdian', 'riset', 'buku_lab.buku.buku_penulis.dosen', 'publikasi_lab', 'fasilitas_lab', 'kegiatan_lab', 'mata_kuliah'])
        //     ->find($id_lab);



        $kepalaLaboratorium = Dosen::with(['laboratorium'])->where('id_lab', $id_lab)
            ->whereHas('dosen_jabatan', function (Builder $query) {
                $query->where('id_jabatan', 2);
            })
            ->first();
        $buku_lab = Buku::with(['buku_penulis.dosen', 'buku_lab.laboratorium'])
            ->whereHas('buku_lab', fn(Builder $query) => $query->where('id_lab', $id_lab))
            ->paginate(10, ['*'], 'ebooks_page')->withQueryString();
        $riset_lab = Riset::with('laboratorium')
            ->whereHas('laboratorium', fn(Builder $query) => $query->where('id', $id_lab))
            ->latest()
            ->paginate(10, ['*'], 'researches_page')->withQueryString();
        $publikasi_lab = Publikasi::with('publikasi_penulis.dosen')
            ->whereHas('publikasi_penulis.dosen', fn(Builder $query) => $query->where('id_lab', $id_lab))
            ->latest()
            ->paginate(10, ['*'], 'publications_page')->withQueryString();
        $fasilitas_lab = Fasilitas::with('fasilitas_lab')
            ->whereHas('fasilitas_lab', fn(Builder $query) => $query->where('id_lab', $id_lab))
            ->latest()
            ->paginate(10, ['*'], 'facilities_page')->withQueryString();

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
            ->latest()
            ->paginate(10, ['*'], 'courses_page')->withQueryString();

        $pengabdian_lab = Pengabdian::where('id_lab', $id_lab)
            ->latest()
            ->paginate(10, ['*'], 'dedications_page')->withQueryString();
        $kegiatan_lab = Kegiatan_lab::with('kegiatan', 'kegiatan_lab_foto')
            ->latest()
            ->where('id_lab', $id_lab)
            // ->whereHas('kegiatan_lab', fn(Builder $query) => $query->where('id_lab', $id_lab))
            ->paginate(10, ['*'], 'activities_page')->withQueryString();
        // dd($kegiatan_lab);

        if ($lab) {
            return view('lab', compact('lab', 'kepalaLaboratorium', 'buku_lab', 'riset_lab', 'publikasi_lab', 'fasilitas_lab', 'matakuliah_lab', 'pengabdian_lab', 'kegiatan_lab', 'semester', 'tahunAjaran'));
        } else {
            return redirect()->back()->with('error', 'Laboratorium tidak ditemukan');
        }
    }
}
