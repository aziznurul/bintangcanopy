<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->text('sejarah_singkat')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('tagline')->nullable();
            $table->text('deskripsi_struktur')->nullable();
            $table->integer('jumlah_proyek')->default(0);
            $table->integer('jumlah_mitra')->default(0);
            $table->decimal('persentase_pengerjaan', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('about');
    }
};
