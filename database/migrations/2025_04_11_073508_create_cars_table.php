<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama mobil
            $table->dateTime('start_rental')->nullable(); // Boleh kosong kalau belum disewa
            $table->dateTime('end_rental')->nullable();   // Boleh kosong juga
            $table->enum('status', ['diterima', 'ditolak', 'pending', 'tersedia'])->nullable(); // Status bisa kosong
            $table->unsignedBigInteger('type_id'); // Relasi ke tabel cars_types
            $table->foreign('type_id')->references('id')->on('cars_types')->onDelete('cascade');
            $table->integer('price'); // Harga sewa per hari
            $table->text('description')->nullable(); // Deskripsi mobil, boleh kosong
            $table->binary('photo')->nullable(); // Menyimpan gambar sebagai binary (BLOB)
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
