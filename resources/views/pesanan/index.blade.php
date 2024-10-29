@extends('app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Pesanan</h1>
    <a href="{{ route('pesanan.create') }}" class="btn btn-primary mb-3">Tambah Pesanan</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="GET" action="{{ route('pesanan.index') }}">
        <input type="text" name="search" placeholder="Cari berdasarkan nama ikan" value="{{ request()->input('search') }}">
        <button type="submit">Cari</button>
    </form>
    

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead style="background-color: #007bff; color: white;"> <!-- Warna latar belakang untuk header -->
                <tr>
                    <th>ID</th>
                    <th>Nama Ikan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->id }}</td>
                        <td>{{ $pesanan->ikan->nama }}</td>
                        <td>{{ $pesanan->jumlah }}</td>
                        <td>{{ $pesanan->total_harga }}</td>
                        <td>
                            <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<style>
    /* Mengubah ukuran font dan padding untuk header tabel */
    table th {
        font-size: 1.2rem; /* Ukuran font header */
        padding: 10px; /* Padding untuk header */
    }

    /* Mengubah ukuran font untuk isi tabel */
    table td {
        font-size: 1rem; /* Ukuran font isi */
        padding: 8px; /* Padding untuk isi */
    }

    /* Efek hover untuk baris tabel */
    table tbody tr:hover {
        background-color: #f1f1f1; /* Warna latar belakang saat hover */
    }
</style>
