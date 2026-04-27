<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique();
            $table->string('jenis_surat');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('nik', 16);
            $table->string('tempat_tgl_lahir');
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('status_kawin');
            $table->text('alamat');
            $table->text('keperluan');
            $table->text('data_tambahan')->nullable();
            $table->enum('status', ['menunggu_staff', 'ditolak_staff', 'menunggu_kades', 'ditolak_kades', 'selesai'])->default('menunggu_staff');
            $table->text('catatan_staff')->nullable();
            $table->text('catatan_kades')->nullable();
            $table->date('tgl_persetujuan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};