<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('geojson_files', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama dataset
            $table->string('filename'); // nama file .geojson
            $table->boolean('is_active')->default(false); // jika true: tampil di dashboard
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geojson_files');
    }
};
