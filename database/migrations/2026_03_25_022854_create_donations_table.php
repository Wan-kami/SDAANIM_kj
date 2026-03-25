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
        Schema::create('donations', function (Blueprint $table) {
            $table->id('Don_id');
            $table->unsignedBigInteger('Usu_documento')->nullable();
            $table->date('Don_fecha');
            $table->decimal('Don_monto', 10, 2);
            $table->enum('Don_metodo_pago', ['Nequi', 'PayPal', 'Daviplata', 'Bancolombia']);
            $table->foreign('Usu_documento')->references('Usu_documento')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
