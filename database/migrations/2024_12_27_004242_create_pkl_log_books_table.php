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
        Schema::create('mhs_pkl_log_books', function (Blueprint $table) {
            $table->increments('id_log_book');
            $table->unsignedBigInteger('id_pkl')->nullable();
            $table->date('tgl_kegiatan_awal')->nullable();
            $table->date('tgl_kegiatan_akhir')->nullable();
            $table->text('kegiatan')->nullable();
            $table->text('file_dokumentasi')->nullable();
            $table->text('komentar')->nullable();
            $table->string('validasi')->nullable();

            $table->timestamps();

            $table->foreign('id_pkl')->references('id_pkl')->on('mhs_pkl')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mhs_pkl_log_books');
    }
};
