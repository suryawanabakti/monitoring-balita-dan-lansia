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
        Schema::create('balita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasien')->cascadeOnDelete();
            $table->string('nib');
            $table->string('nama');
            $table->enum('jk', ['L', 'P']);
            $table->string('nama_orangtua');
            $table->string('alamat');
            $table->string('nohp')->nullable();
            $table->integer('panjang');
            $table->integer('berat');
            $table->integer('lingkar_kepala');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balitas');
    }
};
