<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            if (!Schema::hasColumn('tasks', 'Tar_hora')) {
                $table->time('Tar_hora')->nullable()->after('Tar_estado');
            }
            if (!Schema::hasColumn('tasks', 'Tar_base')) {
                $table->string('Tar_base', 255)->nullable()->after('Tar_hora');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['Tar_hora', 'Tar_base']);
        });
    }
};
