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
        Schema::create('kpi', function (Blueprint $table) {
            $table->id();
            $table->char('daftark_id'); 
            
            $table->string('supervisor');
            $table->string('jabatan_supervisor');
            $table->date('tanggal_kpi');
            $table->date('mulai_pelaksanaan');
            $table->date('selesai_pelaksanaan');
            $table->text('deskripsi_kpi');

            $table->text('area')->nullable();
            $table->text('ket')->nullable();
            $table->string('bobot')->nullable();
            $table->string('target')->nullable();
            $table->string('realisasi')->nullable();

            $table->enum('jenis_perhitungan',['skor-1','skor-2']);
            $table->float('skor')->nullable();
            $table->float('skor_akhir')->nullable();

            $table->string('total_bobot')->nullable();
            $table->float('total_skor_akhir')->nullable();

            $table->text('komentar_catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi');
    }
};
