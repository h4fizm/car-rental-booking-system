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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->dateTime('start_rental');
            $table->dateTime('end_rental');
            $table->enum("status",["accept", "cancel", "reject", "pending", "finish"]);
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('cars_types')->onDelete('cascade');
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
