<?php

namespace App\Livewire\WebEvent;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Invitacion;

class InvitacionComponent extends Component
{
    public $invitacion;

    public function mount()
    {
        // Buscar la invitación del usuario autenticado
        $this->invitacion = Invitacion::where('user_id', Auth::id())->first();

        // Si no tiene invitación, asignar valores por defecto
        if (!$this->invitacion) {
            $this->invitacion = new Invitacion([
                'titulo' => 'Mi Evento Especial',
                'mensaje' => 'Estamos felices de invitarte a nuestro evento.',
                'fecha_evento' => now(),
                'ubicacion' => 'Por definir',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.web-event.invitacion-component', [
            'invitacion' => $this->invitacion
        ]);
    }
}
