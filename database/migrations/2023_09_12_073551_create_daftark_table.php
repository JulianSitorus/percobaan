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
        Schema::create('daftark', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->enum('agama',['islam','kristen','katolik','hindu','buddha','konghucu']);
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('email');
            $table->char('no_telp');
            $table->string('pendidikan');
            $table->string('pekerjaan_terakhir');
            $table->enum('status',['Tetap','Kontrak','Paruh Waktu','Harian']);
            // $table->string('posisi');
            // $table->string('unit');
            // $table->string('departemen');
            $table->string('provinsi');
            $table->string('kabupaten');
            
            $table->string('foto');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftark');
    }
};
