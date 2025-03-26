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
        Schema::create('rekam_kesehatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balita_id')->nullable()->constrained('balita')->nullOnDelete(); // balita or lansia
            $table->foreignId('lansia_id')->nullable()->constrained('lansia')->nullOnDelete(); // balita or lansia
            $table->date('tgl_pemeriksaan');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->float('tekanan_darah');
            $table->float('lingkar_kepala')->nullable();
            $table->enum('imt', ['G', 'K', 'N']);
            $table->integer('p')->nullable();
            $table->integer('n')->nullable();
            $table->integer('gds_gdp')->nullable();
            $table->integer('g3_mata')->nullable();
            $table->integer('g3_telinga')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_kesehatans');
    }
};
