<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos'; // Asegúrate de que el nombre de la tabla sea correcto

    protected $fillable = [
        'user_id',
        'tipo_evento',
        'nombre',
        'novio',
        'novia',
        'fecha_evento',
    ];

    protected $casts = [
        'fecha_evento' => 'datetime',
    ];

    // 🔹 Relación con el usuario (cada evento pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔹 Relación con la invitación (cada evento tiene una invitación)
    public function invitacion()
    {
        return $this->hasOne(Invitacion::class);
    }

    // 🔹 Relación con los grupos de invitados (cada evento tiene varios grupos)
    public function gruposInvitados()
    {
        return $this->hasMany(GrupoInvitados::class);
    }

    // 🔹 Evento de creación para generar automáticamente una invitación
    protected static function booted()
{
    static::created(function ($evento) {
        Invitacion::create([
            'user_id'      => $evento->user_id, // 🔥 Agregamos user_id aquí
            'evento_id'    => $evento->id,
            'tipo_evento'  => $evento->tipo_evento,
            'titulo'       => 'Invitación para ' . ($evento->nombre ?? 'Evento'),
            'mensaje'      => 'Personaliza tu invitación aquí',
            'fecha_evento' => $evento->fecha_evento,
            'ubicacion'    => '',
            'configuracion' => [],
        ]);
    });
}

}
