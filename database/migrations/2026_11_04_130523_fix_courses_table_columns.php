<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('kode_mk', 20)->nullable()->unique();
            $table->string('nama_mk', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedTinyInteger('sks')->nullable();
            $table->string('semester', 50)->nullable();
            $table->foreignId('dosen_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['dosen_id']);
            $table->dropUnique(['kode_mk']);
            $table->dropColumn([
                'kode_mk',
                'nama_mk',
                'deskripsi',
                'sks',
                'semester',
                'dosen_id',
            ]);
        });
    }
};