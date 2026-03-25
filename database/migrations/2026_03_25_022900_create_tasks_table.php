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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('Tar_id');
            $table->unsignedBigInteger('Usu_documento');
            $table->string('Tar_titulo', 255);
            $table->text('Tar_descripcion');
            $table->date('Tar_fecha_asignacion')->nullable();
            $table->date('Tar_fecha_limite');
            $table->string('Tar_estado')->default('Pendiente');
            $table->text('Tar_comentario')->nullable();
            $table->foreign('Usu_documento')->references('Usu_documento')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
