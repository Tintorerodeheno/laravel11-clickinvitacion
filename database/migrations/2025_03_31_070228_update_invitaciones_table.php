<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('invitaciones', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Eliminamos la clave foránea actual
            $table->dropColumn('user_id'); // Eliminamos el campo user_id
            
            $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade'); // Nueva clave foránea
        });
    }

    public function down() {
        Schema::table('invitaciones', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->dropForeign(['evento_id']);
            $table->dropColumn('evento_id');
        });
    }
};
