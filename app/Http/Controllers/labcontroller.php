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
            ->latest()->get();
        // ->paginate(10, ['*'], 'ebooks_page')->withQueryString();
        $riset_lab = Riset::with('laboratorium')
            ->whereHas('laboratorium', fn(Builder $query) => $query->where('id', $id_lab))
            ->latest()->get();
        // ->paginate(10, ['*'], 'researches_page')->withQueryString();
        $publikasi_lab = Publikasi::with('publikasi_penulis.dosen')
            ->whereHas('publikasi_penulis.dosen', fn(Builder $query) => $query->where('id_lab', $id_lab))
            ->latest()->get();
        // dd($publikasi_lab);
        // ->paginate(10, ['*'], 'publications_page')->withQueryString();
        $fasilitas_lab = Fasilitas::with('fasilitas_lab')
            ->whereHas('fasilitas_lab', fn(Builder $query) => $query->where('id_lab', $id_lab))
            ->latest()->get();
        // ->paginate(10, ['*'], 'facilities_page')->withQueryString();

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
        // ->paginate(10, ['*'], 'courses_page')->withQueryString();

        $pengabdian_lab = Pengabdian::where('id_lab', $id_lab)
            ->latest()->get();
        // ->paginate(10, ['*'], 'dedications_page')->withQueryString();
        $kegiatan_lab = Kegiatan_lab::with('kegiatan', 'kegiatan_lab_foto')
            ->latest()
            ->where('id_lab', $id_lab)
            ->latest()->get();
        // ->whereHas('kegiatan_lab', fn(Builder $query) => $query->where('id_lab', $id_lab))
        // ->paginate(10, ['*'], 'activities_page')->withQueryString();
        // dd($kegiatan_lab);

        if ($lab) {
            return view('lab', compact('lab', 'kepalaLaboratorium', 'buku_lab', 'riset_lab', 'publikasi_lab', 'fasilitas_lab', 'matakuliah_lab', 'pengabdian_lab', 'kegiatan_lab', 'semester', 'tahunAjaran'));
        } else {
            return redirect()->back()->with('error', 'Laboratorium tidak ditemukan');
        }
    }
    public function research(Request $request)
    {
        $slug = $request->input('slug');
        $lab = Laboratorium::where('slug', $slug)->first();
        $id_lab = $lab->id;
        $riset_lab = Riset::with('laboratorium')
            ->whereHas('laboratorium', fn(Builder $query) => $query->where('id', $id_lab))
            ->latest();
        return response()->json([
            'data' => $riset_lab->get()->toArray()
        ]);
    }
    // public function getResearch(Request $request)
    // {
    //     $length = $request->input('length', 10);
    //     $start = $request->input('start', 0);
    //     $page = ($start / $length) + 1;
    //     \Log::info('Order Column Index: ' . $request->input('order.0.column'));
    //     \Log::info('Order Column Name: ' . $request->input("columns." . $request->input('order.0.column') . ".data"));
    //     \Log::info('Order Direction: ' . $request->input('order.0.dir'));

    //     \Log::info($request->all());

    //     $columnIndex = $request->input('order.0.column'); // Index kolom
    //     $columnName = $request->input("columns.$columnIndex.data"); // Nama kolom
    //     $columnSortOrder = $request->input('order.0.dir', 'asc'); // Arah sorting (asc/desc)
    //     // Validasi kolom yang diizinkan
    //     $allowedColumns = ['judul_riset', 'tahun'];

    //     // Cek jika kolom kosong atau tidak valid
    //     if (empty($columnName) || !in_array($columnName, $allowedColumns)) {
    //         $columnName = 'judul_riset'; // Fallback kolom default
    //         $columnSortOrder = 'asc';
    //     }

    //     $slug = $request->input('slug');
    //     $lab = Laboratorium::where('slug', $slug)->first();
    //     $id_lab = $lab->id;
    //     $riset_lab = Riset::with('laboratorium')
    //         ->whereHas('laboratorium', fn(Builder $query) => $query->where('id', $id_lab))
    //         ->when($request->input('search.value'), function ($query) use ($request) {
    //             $search = $request->input('search.value');
    //             $query->where(function ($q) use ($search) {
    //                 $q->where('judul_riset', 'like', "%{$search}%")
    //                     ->orWhere('tahun', 'like', "%{$search}%");
    //             });
    //         })
    //         ->orderBy($columnName, $columnSortOrder)
    //         ->latest()->paginate($request->length, ['*'], 'researches_page', $page)->withQueryString();
    //     if (!$lab) {
    //         return response()->json([
    //             "draw" => intval($request->draw),
    //             "recordsTotal" => 0,
    //             "recordsFiltered" => 0,
    //             "data" => []
    //         ]);
    //     }
    //     return response()->json([
    //         "draw" => intval($request->draw),
    //         "data" => $riset_lab->items(),
    //         "recordsTotal" => $riset_lab->total(),
    //         "recordsFiltered" => $riset_lab->total()
    //     ]);
    // }
}
