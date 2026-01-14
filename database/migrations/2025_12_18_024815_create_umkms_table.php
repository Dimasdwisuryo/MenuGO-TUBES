<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            // Relasi ke User
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Detail UMKM
            $table->string('nama_umkm');

            // PERBAIKAN: Hapus ->after(...) karena ini Schema::create
            $table->string('status')->default('pending');

            $table->text('deskripsi')->nullable();
            $table->string('no_telp', 15)->nullable();
            $table->text('alamat');

            // Jam operasional
            $table->time('jam_buka')->nullable();
            $table->time('jam_tutup')->nullable();

            // Informasi tambahan
            $table->string('status_verifikasi')->default('pending');
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
