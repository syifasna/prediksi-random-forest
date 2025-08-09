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
        Schema::create('perkembangan_anaks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tahun_ajaran_id');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans')->onDelete('cascade');
<<<<<<< HEAD
=======
            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
>>>>>>> 89fe746 (50%)
            $table->unsignedBigInteger('anak_id');
            $table->foreign('anak_id')->references('id')->on('anaks')->onDelete('cascade');
            $table->unsignedBigInteger('semester_id');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->date('tanggal');
            $table->float('kognitif');
            $table->float('motorik');
            $table->float('bahasa');
            $table->float('sosial_emosional');
<<<<<<< HEAD
=======
            $table->float('ratarata')->nullable();
            $table->string('ket')->nullable();
>>>>>>> 89fe746 (50%)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkembangan_anaks');
    }
};
