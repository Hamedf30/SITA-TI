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
        Schema::create('mhs_pkl', function (Blueprint $table) {
            $table->id('id_pkl');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->text('judul')->nullable();
            $table->unsignedBigInteger('ruang_sidang')->nullable();
            $table->unsignedBigInteger('id_tmpt_pkl')->nullable();
            $table->year('tahun_pkl')->nullable();
            $table->unsignedBigInteger('dosen_pembimbing')->nullable();
            $table->unsignedBigInteger('dosen_penguji')->nullable();
            $table->string('pembimbing_pkl', 100)->nullable();
            $table->double('nilai_pembibing_industri')->nullable();
            $table->string('dokument_nilai_industri')->nullable();
            $table->string('dokument_pkl')->nullable();
            $table->string('dokument_pkl_revisi')->nullable();
            $table->string('dokument_kuisioner')->nullable();
            $table->dateTime('tgl_sidang')->nullable();
            $table->string('rekomendasi', 12)->nullable();
            $table->text('informasi_detail')->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tmpt_pkl')->references('id_tmpt_pkl')->on('tempat_pkl')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dosen_pembimbing')->references('id')->on('dosens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dosen_penguji')->references('id')->on('dosens')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('ruang_sidang')->references('id')->on('ruangans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mhs_pkl');
    }
};
