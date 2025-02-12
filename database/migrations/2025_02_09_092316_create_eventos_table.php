<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_evento'); // Boda, 15 años, etc.
            $table->string('nombre')->nullable(); // Nombre del evento o protagonista
            $table->string('novio')->nullable(); // Solo para boda
            $table->string('novia')->nullable(); // Solo para boda
            $table->date('fecha_evento');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};

