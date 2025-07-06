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
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // Kolom id (big-integer, auto-increment, primary key)
            $table->string('title');
            $table->string('slug')->unique(); // Slug untuk URL yang SEO-friendly, harus unik
            $table->text('synopsis');
            $table->string('poster_url')->nullable(); // URL bisa jadi kosong
            $table->string('trailer_url')->nullable(); // URL bisa jadi kosong
            $table->unsignedInteger('duration_in_minutes'); // Durasi tidak mungkin negatif
            $table->date('release_date');
            $table->string('age_rating', 10); // Cth: "G", "PG-13", "17+", "21+"
            $table->string('status')->default('Coming Soon');
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
