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
        Schema::create('evaluasi', function (Blueprint $table) {
            $table->id();
            $table->char('daftark_id');   

            $table->string('nama_kd');
            $table->string('tempat_evaluasi');
            $table->date('tanggal_evaluasi');
            $table->enum('tipe_evaluasi', ['Triwulan','Tahunan','Percobaan','Promosi','Khusus']);

            $table->enum('tingkat_keahlian_pertanyaan_1', ['1','2','3','4','5']);
            $table->text('komentar_pertanyaan_1')->nullable();
            $table->enum('tingkat_keahlian_pertanyaan_2', ['1','2','3','4','5']);
            $table->text('komentar_pertanyaan_2')->nullable();
            $table->enum('tingkat_keahlian_pertanyaan_3', ['1','2','3','4','5']);
            $table->text('komentar_pertanyaan_3')->nullable();
            $table->enum('tingkat_keahlian_pertanyaan_4', ['1','2','3','4','5']);
            $table->text('komentar_pertanyaan_4')->nullable();
            $table->enum('tingkat_keahlian_pertanyaan_5', ['1','2','3','4','5']);
            $table->text('komentar_pertanyaan_5')->nullable();
            $table->enum('tingkat_keahlian_pertanyaan_6', ['1','2','3','4','5']);
            $table->text('komentar_pertanyaan_6')->nullable();
            $table->enum('tingkat_keahlian_pertanyaan_7', ['1','2','3','4','5']);
            $table->text('komentar_pertanyaan_7')->nullable();
            $table->enum('tingkat_keahlian_pertanyaan_8', ['1','2','3','4','5']);
            $table->text('komentar_pertanyaan_8')->nullable();
            $table->enum('tingkat_keahlian_pertanyaan_9', ['1','2','3','4','5']);
            $table->text('komentar_pertanyaan_9')->nullable();
            $table->enum('tingkat_keahlian_pertanyaan_10', ['1','2','3','4','5']);
            $table->text('komentar_pertanyaan_10')->nullable();

            $table->enum('tingkat_keahlian2_pertanyaan_1', ['1','2','3','4','5']);
            $table->text('komentar2_pertanyaan_1')->nullable();
            $table->enum('tingkat_keahlian2_pertanyaan_2', ['1','2','3','4','5']);
            $table->text('komentar2_pertanyaan_2')->nullable();
            $table->enum('tingkat_keahlian2_pertanyaan_3', ['1','2','3','4','5']);
            $table->text('komentar2_pertanyaan_3')->nullable();
            $table->enum('tingkat_keahlian2_pertanyaan_4', ['1','2','3','4','5']);
            $table->text('komentar2_pertanyaan_4')->nullable();
            $table->enum('tingkat_keahlian2_pertanyaan_5', ['1','2','3','4','5']);
            $table->text('komentar2_pertanyaan_5')->nullable();

            $table->integer('total_keseluruhan')->nullable();
            $table->integer('total_keseluruhan2')->nullable();

            $table->enum('kerja', ['Melebihi standard','Standard','Dibawah standard']);   
            $table->text('komentar_kerja')->nullable();
            $table->enum('rekomendasi', ['Kontrak diperpanjang','Kontrak tidak diperpanjang','Dipromosi untuk level lebih tinggi']);   
            $table->text('komentar_rekomendasi')->nullable();
            
            $table->text('komentar_kekuatan')->nullable();
            $table->text('komentar_kelemahan')->nullable();

            $table->text('komentar_pelatihan')->nullable();

            $table->text('komentar_catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi');
    }
};
