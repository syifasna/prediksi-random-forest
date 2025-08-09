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
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perkembangan_id');
            $table->foreign('perkembangan_id')->references('id')->on('perkembangan_anaks')->onDelete('cascade');
            $table->enum('hasil_prediksi', ['Sesuai Usia', 'Perlu Pendampingan', 'Dibawah Usia']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasis');
    }
};
