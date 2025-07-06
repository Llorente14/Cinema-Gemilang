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
        Schema::create('studios', function (Blueprint $table) {
            $table->id(); // Kolom id
            $table->string('name')->unique(); // Nama studio sebaiknya unik
            $table->unsignedInteger('seat_rows')->default(10);
            $table->unsignedInteger('seat_columns')->default(12);
            $table->boolean('is_maintenance')->default(false);
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studios');
    }
};
