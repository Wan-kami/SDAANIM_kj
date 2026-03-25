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
        Schema::create('adoption_followups', function (Blueprint $table) {
            $table->id('Segui_id');
            $table->unsignedBigInteger('Soli_id');
            $table->enum('Segui_tipo', ['Entrevista', 'Visita', 'Pos_visita']);
            $table->enum('Segui_estado', ['Pendiente', 'En proceso', 'Aprobada', 'Rechazada']);
            $table->text('Segui_descripcion')->nullable();
            $table->date('Segui_fecha')->nullable();
            $table->foreign('Soli_id')->references('Soli_id')->on('adoption_requests')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption_followups');
    }
};
