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
        Schema::create('animals', function (Blueprint $table) {
            $table->id('Anim_id');
            $table->string('Anim_nombre', 100);
            $table->string('Anim_raza', 100)->nullable();
            $table->string('Anim_edad', 11)->nullable();
            $table->enum('Anim_estado', ['Disponible', 'Adoptado', 'En Proceso'])->default('Disponible');
            $table->string('Anim_foto', 225)->nullable();
            $table->text('Anim_historia');
            $table->enum('Anim_sexo', ['Macho', 'Hembra'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
