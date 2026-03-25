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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id('Hist_id');
            $table->unsignedBigInteger('Anim_id');
            $table->unsignedBigInteger('Usu_documento');
            $table->foreign('Usu_documento')->references('Usu_documento')->on('users');
            $table->foreign('Anim_id')->references('Anim_id')->on('animals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
