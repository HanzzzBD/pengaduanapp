<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function histori(Request $request)
    {
        $aspirasis = collect(); // default kosong

        if ($request->filled('nis')) {
            $aspirasis = InputAspirasi::with(['kategori', 'aspirasi'])
                ->where('nis', $request->nis)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('siswa.histori', compact('aspirasis', 'request'));
    }
}
