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
        Schema::create('kepengurusans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('email', 191)->nullable();
            $table->string('department', 150)->nullable();
            $table->string('group', 100);
            $table->string('position', 100);
            $table->string('period', 50)->default('Periode 2025/2026');
            $table->integer('order')->default(1);
            $table->string('status', 30)->default('Dipublikasikan');
            $table->string('photo_url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepengurusans');
    }
};
