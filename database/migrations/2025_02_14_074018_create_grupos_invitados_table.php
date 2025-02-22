<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('grupo_invitados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained()->onDelete('cascade'); // Relación con eventos
            $table->string('nombre_grupo'); // Nombre del grupo
            $table->text('invitados'); // Lista de invitados en formato texto (separados por coma)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupo_invitados');
    }
};
