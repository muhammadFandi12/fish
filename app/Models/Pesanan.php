<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $fillable = ['ikan_id', 'jumlah', 'total_harga'];

    public function ikan()
    {
        return $this->belongsTo(Ikan::class, 'ikan_id'); // Ganti 'ikan_id' sesuai dengan nama kolom foreign key yang digunakan
    }

    // Method untuk menghitung total harga
    public function totalHarga()
    {
        return $this->jumlah * $this->ikan->harga; // Pastikan 'harga' adalah kolom yang ada di model Ikan
    }
}


