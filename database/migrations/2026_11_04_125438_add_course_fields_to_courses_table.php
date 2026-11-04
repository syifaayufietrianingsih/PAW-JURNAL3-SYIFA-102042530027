<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'kode_mk')) {
                $table->string('kode_mk', 20)->nullable()->unique();
            }

            if (!Schema::hasColumn('courses', 'nama_mk')) {
                $table->string('nama_mk', 255)->nullable();
            }

            if (!Schema::hasColumn('courses', 'deskripsi')) {
                $table->text('deskripsi')->nullable();
            }

            if (!Schema::hasColumn('courses', 'sks')) {
                $table->unsignedTinyInteger('sks')->nullable();
            }

            if (!Schema::hasColumn('courses', 'semester')) {
                $table->string('semester', 50)->nullable();
            }

            if (!Schema::hasColumn('courses', 'dosen_id')) {
                $table->foreignId('dosen_id')
                    ->nullable()
                    ->constrained('users')
                    ->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        // Tidak menghapus kolom agar data tetap aman.
    }
};