@extends('app')
<style>
    .card-img-top {
        width: 100%; /* Atur lebar gambar menjadi 100% dari elemen induk */
        height: auto; /* Biarkan tinggi gambar disesuaikan secara otomatis */
        max-height: 250px; /* Atur tinggi maksimum untuk gambar */
        object-fit: cover; /* Sesuaikan gambar dengan rasio aspek */
    }
</style>
@section('content')
<div class="container">
    <h1 class="text-center mb-4">Daftar Ikan</h1>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('ikan.index') }}">
        <input type="text" name="search" placeholder="Cari berdasarkan nama ikan">
        <button type="submit">Cari</button>
    </form>

    <!-- Tombol Tambah Ikan Baru -->
    <div class="mb-3 text-end">
        <a href="{{ route('ikan.create') }}" class="btn btn-success">Tambah Ikan Baru</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($ikan->isEmpty())
        <div class="alert alert-warning" role="alert">
            Tidak ada ikan tersedia.
        </div>
    @else
        <div class="row">
            @foreach ($ikan as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light">
                        <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://via.placeholder.com/300' }}" class="card-img-top" alt="{{ $item->nama }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">Harga: <strong>Rp {{ number_format($item->harga, 2) }}</strong></p>
                            <p class="card-text">Stok: <strong>{{ $item->stok }}</strong></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('ikan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('ikan.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
