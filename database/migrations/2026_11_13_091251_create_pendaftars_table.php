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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('nim', 50)->unique();
            $table->string('major', 100);
            $table->string('email', 191);
            $table->string('phone_number', 30)->nullable();
            $table->string('division', 100);
            $table->string('cv_url', 255)->nullable();
            $table->string('status', 50)->default('Mendaftar');
            $table->text('motivation')->nullable();
            $table->string('interview_date', 50)->nullable();
            $table->string('interview_time', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
