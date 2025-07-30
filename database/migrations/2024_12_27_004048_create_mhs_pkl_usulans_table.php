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
        Schema::create('mhs_pkl_usulan', function (Blueprint $table) {
            $table->id('id_usulan');
            $table->unsignedBigInteger('mahasiswa_id')->nullable();
            $table->unsignedBigInteger('id_tmpt_pkl')->nullable();
            $table->string('tahun_ajaran', 40)->nullable();
            $table->string('konfirmasi')->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tmpt_pkl')->references('id_tmpt_pkl')->on('tempat_pkl')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mhs_pkl_usulan');
    }
};
