<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use App\Models\Admin;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Halaman Login Admin
    public function loginForm()
    {
        return view('admin.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admins = Admin::where('username', $request->username)->first();

        if ($admins && Hash::check($request->password, $admins->password)) {
            session([
                'admin_login' => true,
                'admin_username' => $admins->username
            ]);
            return redirect()->route('admin.dashboard');
        }
    }

    // Logout
    public function logout()
    {
        session()->forget(['admin_login', 'admin_username']);
        return redirect()->route('admin.login');
    }

    // Dashboard Admin (List Aspirasi)
   public function dashboard(Request $request)
{
    if (!session('admin_login')) {
        return redirect()->route('admin.login');
    }

    $query = InputAspirasi::with(['siswa', 'kategori', 'aspirasi']);

    // Filter
    if ($request->filled('tanggal')) {
        $query->whereDate('created_at', $request->tanggal);
    }
    if ($request->filled('nis')) {
        $query->where('nis', $request->nis);
    }
    if ($request->filled('kategori')) {
        $query->where('id_kategori', $request->kategori);
    }

    $aspirasis = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.dashboard', compact('aspirasis'));
}

    // Simpan Umpan Balik & Status
    public function updateFeedback(Request $request, $id_pelapor)
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'status'   => 'required|in:Menunggu,Proses,Selesai',
            'feedback' => 'required|string',
        ]);

        $inputAspirasi = InputAspirasi::findOrFail($id_pelapor);

        Aspirasi::updateOrCreate(
            ['id_pelapor' => $id_pelapor],
            [
                'username'    => session('admin_username'),
                'id_kategori' => $inputAspirasi->id_kategori,
                'status'      => $request->status,
                'feedback'    => $request->feedback,
            ]
        );

        return back()->with('success', 'Umpan balik dan status berhasil disimpan!');
    }
}
