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
        Schema::table('kaprodis', function (Blueprint $table) {
            $table->foreignId('jurusan_id')->nullable()->after('prodi_id'); // Menambahkan kolom gambar
            $table->enum('jekel', ['pria','wanita'])->nullable()->after('prodi_id'); // Menambahkan kolom gambar
            $table->string('gambar')->nullable()->after('prodi_id'); // Menambahkan kolom gambar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kaprodis', function (Blueprint $table) {
            $table->dropColumn('jurusan_id'); // Menghapus kolom gambar jika di-rollback
            $table->dropColumn('jekel'); // Menghapus kolom gambar jika di-rollback
            $table->dropColumn('gambar'); // Menghapus kolom gambar jika di-rollback
        });
    }
};
