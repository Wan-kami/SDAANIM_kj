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
        Schema::create('adoption_requests', function (Blueprint $table) {
            $table->id('Soli_id');
            $table->unsignedBigInteger('Usu_documento');
            $table->unsignedBigInteger('Anim_id');
            $table->timestamp('Soli_fecha')->useCurrent();
            $table->enum('Soli_estado', ['Pendiente', 'Asignada', 'En Entrevista', 'Aprobada', 'No Apta', 'Proceso Adopcion', 'Rechazada'])->default('Pendiente');
            $table->unsignedBigInteger('Soli_voluntario')->nullable();
            $table->text('Soli_motivo')->nullable();
            $table->string('Soli_otras_mascotas', 200)->nullable();
            $table->string('Soli_tipo_vivienda', 50)->nullable();
            $table->string('Soli_tiempo_disponible', 50)->nullable();
            $table->text('Soli_comentarios')->nullable();
            $table->foreign('Usu_documento')->references('Usu_documento')->on('users')->onDelete('cascade');
            $table->foreign('Anim_id')->references('Anim_id')->on('animals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption_requests');
    }
};
