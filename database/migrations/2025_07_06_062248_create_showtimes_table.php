<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('showtimes', function (Blueprint $table) {
             $table->id(); // Kolom id

            // Foreign key untuk movies
            $table->foreignId('movie_id')
                  ->constrained('movies') // merujuk ke tabel 'movies'
                  ->onDelete('cascade'); // Jika film dihapus, jadwal tayangnya juga terhapus

            // Foreign key untuk studios
            $table->foreignId('studio_id')
                  ->constrained('studios') // merujuk ke tabel 'studios'
                  ->onDelete('cascade'); // Jika studio dihapus, jadwalnya juga terhapus

            $table->dateTime('start_time'); // Waktu mulai tayang (Tanggal dan Jam)
            $table->unsignedInteger('price'); // Harga tiket, simpan sebagai integer (misal: 50000 untuk Rp 50.000)
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
