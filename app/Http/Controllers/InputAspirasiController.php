<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class InputAspirasiController extends Controller
{
    // Tampilkan form aspirasi siswa
    public function index()
    {
        $kategoris = Kategori::all();
        return view('aspirasi.form', compact('kategoris'));
    }

    // Simpan aspirasi dari siswa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis'         => 'required|integer|exists:siswas,nis',
            'id_kategori' => 'required|exists:kategoris,id_kat',
            'lokasi'      => 'required|string|max:255',
            'keterangan'  => 'required|string',
        ]);

        InputAspirasi::create($validated);

        return redirect()->route('aspirasi.form')
                         ->with('success', 'Aspirasi berhasil dikirim! Terima kasih.');
    }
}
