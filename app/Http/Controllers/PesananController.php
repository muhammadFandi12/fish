<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\Ikan;

class PesananController extends Controller
{
    // Menampilkan semua pesanan
    public function index(Request $request) // Tambahkan Request di parameter
    {
        $search = $request->input('search'); // Ambil parameter pencarian
        
        if ($search) {
            $pesanans = Pesanan::whereHas('ikan', function($query) use ($search) {
                $query->where('nama', 'LIKE', "%{$search}%"); // Mencari berdasarkan nama ikan
            })->get();
        } else {
            $pesanans = Pesanan::all(); // Jika tidak ada pencarian, ambil semua data
        }

        return view('pesanan.index', compact('pesanans')); // Kirim data pesanan ke view
    }

    // Menyimpan pesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'ikan_id' => 'required|exists:ikan,id',
            'jumlah' => 'required|integer',
        ]);

        // Ambil harga ikan berdasarkan ikan_id
        $ikan = Ikan::findOrFail($request->ikan_id);
        
        // Buat pesanan dan hitung total_harga secara otomatis
        Pesanan::create([
            'ikan_id' => $request->ikan_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $ikan->harga * $request->jumlah, // Hitung total harga
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil ditambahkan.');
    }

    public function create()
    {
        $ikans = Ikan::all(); // Mengambil semua ikan
        return view('pesanan.create', compact('ikans'));
    }

    // Menampilkan form untuk mengedit pesanan
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $ikans = Ikan::all(); // Mengambil semua ikan
        return view('pesanan.edit', compact('pesanan', 'ikans'));
    }

    // Memperbarui pesanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'ikan_id' => 'required|exists:ikan,id',
            'jumlah' => 'required|integer',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update($request->all());

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    // Menghapus pesanan
    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
