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
        Schema::create('bencanas', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_bencana',
                ['tanah longsor','gempa','banjir','cuaca ekstrem']
            );
            $table->string('lokasi');
            $table->unsignedTinyInteger('tingkat_kerentanan'); // 0‑5, mis.
            $table->string('warna', 10);                       // hex / nama warna
            $table->string('geojson_path');                    // path berkas di storage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bencanas');
    }
};
