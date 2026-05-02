@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Histori Aspirasi Siswa</h2>

    <!-- Form Input NIS -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('siswa.histori') }}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Masukkan NIS Anda</label>
                        <input type="number" name="nis" class="form-control" 
                               value="{{ request('nis') }}" placeholder="Contoh: 1234567890" required>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i> Lihat Histori
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if(request('nis'))
        @if($aspirasis->isEmpty())
            <div class="alert alert-info">
                <strong>NIS {{ request('nis') }}</strong> belum memiliki aspirasi.<br>
                Silakan kirim aspirasi terlebih dahulu di Form Aspirasi.
            </div>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Umpan Balik / Progres</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aspirasis as $item)
                    <tr>
                        <td>{{ optional($item->created_at)->format('d-m-Y H:i') ?? '-' }}</td>
                        <td>{{ $item->kategori->ket_kat ?? '-' }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <span class="badge bg-{{ $item->aspirasi && $item->aspirasi->status == 'Selesai' ? 'success' : ($item->aspirasi && $item->aspirasi->status == 'Proses' ? 'warning' : 'secondary') }}">
                                {{ $item->aspirasi->status ?? 'Menunggu' }}
                            </span>
                        </td>
                        <td>{{ $item->aspirasi->feedback ?? 'Belum ada umpan balik' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif

    <a href="{{ route('aspirasi.form') }}" class="btn btn-success">Kembali ke Form Aspirasi</a>
</div>
@endsection
