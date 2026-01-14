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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            // Pastikan tabel umkms sudah ada (karena urutannya di atas file ini)
            $table->foreignId('umkm_id')->constrained('umkms')->onDelete('cascade');
            // Pastikan tabel categories sudah ada (karena urutannya paling atas)
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            $table->string('nama_menu');
            $table->integer('harga');
            $table->text('deskripsi_menu')->nullable();
            $table->string('gambar_menu');
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
