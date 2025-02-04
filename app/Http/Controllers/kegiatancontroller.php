<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan_lab;
use Illuminate\Http\Request;

class kegiatancontroller extends Controller
{
    public function detail(Request $request)
    {
        $id_kegiatan_lab = $request->input('id_kegiatan_lab');
        $kegiatan = Kegiatan_lab::with('kegiatan_lab_foto', 'kegiatan')->find($id_kegiatan_lab);

        // dd($kegiatan['id']);
        return view('kegiatan', compact('kegiatan'));
        // return view('index');
    }
}
