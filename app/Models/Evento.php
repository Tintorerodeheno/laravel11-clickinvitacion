<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo_evento',
        'nombre',
        'novio',
        'novia',
        'fecha_evento',
    ];

    // 🔹 Definir la relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function gruposInvitados()
{
    return $this->hasMany(GrupoInvitados::class);
}
}