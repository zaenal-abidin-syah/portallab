<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Laboratorium;
use Illuminate\Http\Request;

class dosencontroller extends Controller
{
    public function show()
    {
        // Melakukan query berdasarkan id_lab yang dikirim

        $laboratorium = Laboratorium::with('dosen.dosen_jabatan.jabatan')->get();

        // Cek apakah lab ditemukan
        return view('dosen', compact('laboratorium'));
    }

    public function detail(Request $request)
    {
        $id_dosen = $request->input('id_dosen');
        $dosen = Dosen::with('dosen_jabatan.jabatan')->find($id_dosen);

        return view('dosendetail', compact('dosen'));
        // return view('index');
    }
}
