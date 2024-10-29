<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ikan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">{{ isset($ikan) ? 'Edit' : 'Tambah' }} Ikan</h1>

    <form action="{{ isset($ikan) ? route('ikan.update', $ikan->id) : route('ikan.store') }}" method="POST">
        @csrf
        @if(isset($ikan)) @method('PUT') @endif
        <div class="form-group">
            <label>Nama Ikan</label>
            <input type="text" name="nama" class="form-control" value="{{ $ikan->nama ?? '' }}" required>
        </div>
        <div class="form-group">
            <label>Jenis</label>
            <input type="text" name="jenis" class="form-control" value="{{ $ikan->jenis ?? '' }}" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $ikan->harga ?? '' }}" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $ikan->stok ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($ikan) ? 'Update' : 'Simpan' }}</button>
    </form>
    <a href="{{ route('ikan.index') }}" class="btn btn-secondary mt-2">Kembali</a>
</div>
</body>
</html>
