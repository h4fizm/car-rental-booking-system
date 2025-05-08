<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->text('description'); // Memperbaiki typo: "decription" menjadi "description"
            $table->integer('price');
            $table->date('start_date'); // Kolom untuk tanggal mulai
            $table->date('end_date');   // Kolom untuk tanggal akhir
            $table->time('start_time'); // Kolom untuk waktu mulai
            $table->time('end_time');   // Kolom untuk waktu akhir
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
