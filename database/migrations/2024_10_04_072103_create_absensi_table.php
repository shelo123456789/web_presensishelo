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
    Schema::create('absensi', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // ID siswa
        $table->unsignedBigInteger('user_id')->references('id')->no('user')->cascadeOnedelet()->cascadeOnUpdate();
        $table->date('tanggal');
        $table->time('waktu_datang')->nullable(); // Waktu datang
        $table->time('waktu_pulang')->nullable(); // Waktu pulang
        $table->enum('status', ['hadir', 'Izin', 'alpha'])->default('hadir')->nullable();
        $table->timestamps(); // Created_at dan updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
