<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasColumn('users', 'role')) {
            DB::table('users')->whereNotIn('role', ['admin', 'staff', 'pendaftar'])->update(['role' => 'pendaftar']);
        }

        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['admin', 'staff', 'pendaftar'])->default('pendaftar')->after('password');
            } else {
                $table->enum('role', ['admin', 'staff', 'pendaftar'])->default('pendaftar')->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role')) {
                $table->string('role', 20)->default('candidate')->change();
            }
        });
    }
};
