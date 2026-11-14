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
        Schema::create('jadwal_wawancaras', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('jam_mulai', 10);
            $table->string('jam_selesai', 10);
            $table->string('pewawancara', 150);
            $table->integer('durasi_menit')->default(15);
            $table->integer('kuota')->default(1);
            $table->string('mode', 20)->default('Offline');
            $table->string('lokasi', 255);
            $table->string('status', 30)->default('Tersedia'); // Tersedia, Terisi, Dibatalkan
            $table->foreignId('pendaftar_id')->nullable()->constrained('pendaftars')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_wawancaras');
    }
};
