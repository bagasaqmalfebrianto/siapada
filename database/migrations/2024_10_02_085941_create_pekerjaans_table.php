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
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("nama_perusahaan");
            $table->string("jenis");
            $table->string("type");
            $table->string("pendidikan");
            $table->unsignedBigInteger("gaji_minimum");
            $table->unsignedBigInteger("gaji_maksimum");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaans');
    }
};
