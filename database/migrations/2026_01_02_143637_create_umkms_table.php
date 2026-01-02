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
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            // Menghubungkan UMKM ke User (Foreign Key)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_toko')->nullable();
            $table->string('alamat')->nullable();
            // Status untuk fitur verifikasi Admin
            $table->enum('status_verifikasi', ['pending', 'approved', 'rejected'])->default('pending');
            $table->boolean('is_open')->default(true); // Fitur buka/tutup toko
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
