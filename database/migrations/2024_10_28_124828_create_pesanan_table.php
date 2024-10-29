<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('pesanan', function (Blueprint $table) {
        $table->id();
        $table->foreignId('ikan_id')->constrained('ikan')->onDelete('cascade'); // Perbaiki referensi tabel ke 'ikan'
        $table->integer('jumlah');
        $table->decimal('total_harga', 10, 2);
        $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
