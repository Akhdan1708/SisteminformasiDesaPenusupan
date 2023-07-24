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
        Schema::create('ketua_r_t_s', function (Blueprint $table) {
            $table->id();
            $table->string('rt',5);
            $table->string('id_rw', 10);
            $table->string('nama_rt');
            $table->text('alamat_rt');
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ketua_r_t_s');
    }
};
