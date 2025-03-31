<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('invitaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tipo_evento'); // boda, quinceaños, etc.
            $table->string('titulo');
            $table->text('mensaje');
            $table->dateTime('fecha_evento');
            $table->string('ubicacion')->nullable();
            $table->json('configuracion')->nullable(); // JSON con personalización
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('invitaciones');
    }
};
