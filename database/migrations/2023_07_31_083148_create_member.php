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
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->uuid('ref');
            $table->uuid('ref_mesjid');
            $table->string('nama_usaha',100);
            $table->string('nama_pemilik',100);
            $table->string('logo',100)->nullable();
            $table->integer('jenis_usaha')->nullable();
            $table->integer('provinsi')->nullable();
            $table->integer('kabupaten')->nullable();
            $table->integer('kecamatan')->nullable();
            $table->integer('kelurahan')->nullable();
            $table->string('rt',10)->nullable();
            $table->string('rw',10)->nullable();
            $table->string('kode_pos',10)->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->integer('status_tempat')->nullable(); // milik sendiir/ orang lain
            $table->integer('perizinan')->nullable();
            $table->integer('badan_usaha')->nullable();
            $table->integer('npwp_pelaporan')->nullable();
            $table->integer('laporan_keuangan')->nullable(); // manual/aplikasi
            $table->integer('laporan_laba_rugi')->nullable();
            $table->integer('laporan_neraca')->nullable();
            $table->integer('laporan_arus_kas')->nullable();
            $table->integer('akses_permodalan')->nullable();
            $table->string('no_ponsel',20)->nullable();
            $table->string('email',100)->nullable();
            $table->date('mulai_beroperasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
