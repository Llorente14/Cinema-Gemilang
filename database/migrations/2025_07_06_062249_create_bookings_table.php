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
        Schema::create('bookings', function (Blueprint $table) {
              $table->id(); // Kolom id

            // Foreign key untuk users
            $table->foreignId('user_id')
                  ->constrained('users') // Merujuk ke tabel 'users'
                  ->onDelete('cascade'); // Jika user dihapus, booking-nya juga terhapus

            // Foreign key untuk showtimes
            $table->foreignId('showtime_id')
                  ->constrained('showtimes') // Merujuk ke tabel 'showtimes'
                  ->onDelete('cascade'); // Jika jadwal tayang dihapus, booking-nya juga terhapus

            $table->unsignedInteger('total_price');
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->string('booking_code')->unique(); // Kode unik untuk setiap booking
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
