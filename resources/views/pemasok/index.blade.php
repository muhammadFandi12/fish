@extends('app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Pemasok</h1>
    <a href="{{ route('pemasok.create') }}" class="btn btn-primary mb-3">Tambah Pemasok</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="GET" action="{{ route('pemasok.index') }}">
        <input type="text" name="search" placeholder="Cari berdasarkan nama ikan" value="{{ request()->input('search') }}">
        <button type="submit">Cari</button>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead style="background-color: #007bff; color: white;"> <!-- Warna latar belakang untuk header -->
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemasoks as $pemasok)
                    <tr>
                        <td>{{ $pemasok->id }}</td>
                        <td>{{ $pemasok->nama }}</td>
                        <td>{{ $pemasok->alamat }}</td>
                        <td>{{ $pemasok->telepon }}</td>
                        <td>
                            <a href="{{ route('pemasok.edit', $pemasok->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pemasok.destroy', $pemasok->id) }}" method="POST" style="display:inline;">
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
