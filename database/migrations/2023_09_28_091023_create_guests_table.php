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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_checkin');
            $table->foreignId('user_checkout')->nullable();
            $table->string('nama_tamu');
            $table->string('keperluan_tamu');
            $table->string('bertemu');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->string('asal_instansi');
            $table->bigInteger('telepon');
            $table->string('kode_kunjungan');
            $table->dateTime('check_in');
            $table->dateTime('check_out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
