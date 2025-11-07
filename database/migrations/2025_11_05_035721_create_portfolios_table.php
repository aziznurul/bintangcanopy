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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->nullable();
            $table->string('judul');
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('kategori')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('nama_klien')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
