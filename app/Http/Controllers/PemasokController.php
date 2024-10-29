<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    // Menampilkan semua pemasok
    public function index(Request $request) // Tambahkan Request di parameter
    {
        $search = $request->input('search'); // Ambil parameter pencarian
        
        if ($search) {
            $pemasoks = Pemasok::where('nama', 'LIKE', "%{$search}%")->get(); // Mencari berdasarkan nama pemasok
        } else {
            $pemasoks = Pemasok::all(); // Jika tidak ada pencarian, ambil semua data
        }

        return view('pemasok.index', compact('pemasoks')); // Kirim data pemasok ke view
    }

    public function create()
    {
        return view('pemasok.create'); // Pastikan Anda memiliki view 'pemasok.create'
    }

    // Menyimpan pemasok baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
        ]);

        Pemasok::create($request->all());

        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit pemasok
    public function edit($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        return view('pemasok.edit', compact('pemasok'));
    }

    // Memperbarui pemasok
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
        ]);

        $pemasok = Pemasok::findOrFail($id);
        $pemasok->update($request->all());

        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil diperbarui.');
    }

    // Menghapus pemasok
    public function destroy($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->delete();

        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil dihapus.');
    }
}
