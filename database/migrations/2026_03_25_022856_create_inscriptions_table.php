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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id('ins_id');
            $table->string('ins_documento', 20);
            $table->string('ins_nombre', 100);
            $table->string('ins_email', 100);
            $table->string('ins_direccion', 150)->nullable();
            $table->string('ins_telefono', 20)->nullable();
            $table->enum('ins_tipo_rol', ['voluntario', 'veterinario']);
            $table->string('ins_especialidad', 100)->nullable();
            $table->integer('ins_experiencia_anos')->nullable();
            $table->string('ins_certificado', 150)->nullable();
            $table->string('ins_tipo_ayuda', 100)->nullable();
            $table->text('ins_comentario')->nullable();
            $table->enum('ins_estado', ['Pendiente', 'Aprobada', 'Rechazada'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
