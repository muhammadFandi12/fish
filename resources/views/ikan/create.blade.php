@extends('app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Tambah Ikan Baru</h1>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('ikan.create') }}" class="btn btn-success">Tambah Ikan Baru</a>
    </div>

    <form action="{{ route('ikan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Ikan</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Ikan</label>
            <input type="text" class="form-control" id="jenis" name="jenis" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Ikan</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('ikan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
