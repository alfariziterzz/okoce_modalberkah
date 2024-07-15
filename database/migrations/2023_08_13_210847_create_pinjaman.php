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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->uuid('ref');
            $table->uuid('ref_member');
            $table->uuid('ref_mesjid');
            $table->string('jumlah_pengajuan',20)->nullable();
            $table->string('jumlah_disetujui',20)->nullable();
            $table->integer('status_persetujuan')->nullable();
            $table->integer('status_lunas')->nullable();
            $table->date('tanggal_pengajuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};
