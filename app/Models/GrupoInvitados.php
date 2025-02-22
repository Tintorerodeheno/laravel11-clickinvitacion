<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoInvitados extends Model
{
    use HasFactory;

    protected $fillable = ['evento_id', 'nombre_grupo', 'invitados'];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
