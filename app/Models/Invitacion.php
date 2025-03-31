<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitacion extends Model {
    use HasFactory;

    protected $table = 'invitaciones'; // Nombre real de la tabla

    protected $fillable = [
        'user_id',
        'tipo_evento',
        'titulo',
        'mensaje',
        'fecha_evento',
        'ubicacion',
        'configuracion',
    ];

    protected $casts = [
        'fecha_evento' => 'datetime',
        'configuracion' => 'array',
    ];

    // Relación con el usuario
    public function user() {
        return $this->belongsTo(User::class);
    }
}
