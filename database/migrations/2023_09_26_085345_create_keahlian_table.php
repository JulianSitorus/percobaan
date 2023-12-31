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
        Schema::create('keahlian', function (Blueprint $table) {
            $table->id();
            $table->char('daftark_id');
            $table->string('nama_keahlian');
            $table->enum('tingkat_keahlian', ['Sangat Baik','Baik','Standar','Dibawah Standar','Buruk']);
            $table->enum('jenis_keahlian', ['Hard Skill','Soft Skill']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keahlian');
    }
};
