@extends('app')

@section('content')
<div class="container">
    <h1>Edit Pemasok</h1>

    <form action="{{ route('pemasok.update', $pemasok->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $pemasok->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $pemasok->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $pemasok->telepon }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pemasok.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
