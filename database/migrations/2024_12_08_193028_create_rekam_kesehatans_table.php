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
            $table->float('berat_badan')->nullable();
            $table->float('tinggi_badan')->nullable();
            $table->float('tekanan_darah')->nullable();
            $table->float('lingkar_kepala')->nullable();
            $table->enum('imt', ['G', 'K', 'N'])->nullable();
            $table->integer('p')->nullable();
            $table->integer('n')->nullable();
            $table->integer('gds_gdp')->nullable();
            $table->integer('g3_mata')->nullable();
            $table->integer('g3_telinga')->nullable();
            $table->text('catatan')->nullable();

            // LANSIA
            $table->boolean('lansia')->default(false);
            $table->boolean('hb_kurang')->default(false);
            $table->boolean('kolestrol')->default(false);
            $table->boolean('asam_urat')->default(false);
            $table->boolean('gangguan_ginjal')->default(false);
            $table->boolean('gangguan_pendengaran')->default(false);
            $table->boolean('gangguan_mata')->default(false);
            $table->boolean('gangguan_mental')->default(false);

            // BALITA
            $table->string('tppb')->nullable();
            $table->boolean('asi_ekslusif')->default(false);
            $table->boolean('vit_a')->default(false);
            $table->string('umur')->default(false);
            $table->string('pmt_ke')->nullable();
            $table->string('bgt_bgm')->nullable();
            $table->boolean('imd')->default(false);
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
