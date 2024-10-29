@extends('app')

@section('content')
<div class="container">
    <h1>Edit Pesanan</h1>

    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="ikan_id" class="form-label">Ikan</label>
            <select name="ikan_id" id="ikan_id" class="form-select" required>
                @foreach ($ikans as $ikan)
                    <option value="{{ $ikan->id }}" {{ $ikan->id == $pesanan->ikan_id ? 'selected' : '' }}>
                        {{ $ikan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $pesanan->jumlah }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
