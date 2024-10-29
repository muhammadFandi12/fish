<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use Illuminate\Http\Request;

class IkanController extends Controller
{
    public function index(Request $request) // Tambahkan Request di parameter
    {
        $search = $request->input('search'); // Ambil parameter pencarian
        
        if ($search) {
            $ikan = Ikan::where('nama', 'LIKE', "%{$search}%")->get(); // Lakukan pencarian
        } else {
            $ikan = Ikan::all(); // Jika tidak ada pencarian, ambil semua data
        }

        return view('ikan.index', compact('ikan')); // Kirim data ikan ke view
    }

    public function create()
    {
        return view('ikan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('ikan', 'public');
        }

        Ikan::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('ikan.index')->with('success', 'Ikan berhasil ditambahkan.');
    }

    public function edit(Ikan $ikan)
    {
        return view('ikan.edit', compact('ikan'));
    }

    public function update(Request $request, Ikan $ikan)
    {
        $ikan->update($request->all());
        return redirect()->route('ikan.index');
    }

    public function destroy(Ikan $ikan)
    {
        $ikan->delete();
        return redirect()->route('ikan.index');
    }
}
