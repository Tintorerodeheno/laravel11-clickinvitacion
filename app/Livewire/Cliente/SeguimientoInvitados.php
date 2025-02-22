<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Evento;
use App\Models\GrupoInvitados;

class SeguimientoInvitados extends Component
{
    public $eventos;
    public $eventoSeleccionado;
    public $mostrarGrupos = false;
    public $showModalGrupo = false;
    public $nombreGrupo;
    public $invitadosGrupo;

    public function mount()
    {
        $this->eventos = Evento::where('user_id', Auth::id())->get();
    }

    public function updatedEventoSeleccionado()
    {
        $this->mostrarGrupos = true;
    }

    public function abrirModalGrupo()
    {
        $this->reset(['nombreGrupo', 'invitadosGrupo']);
        $this->showModalGrupo = true;
    }

    public function guardarGrupo()
    {
        $this->validate([
            'nombreGrupo' => 'required|string|max:255',
            'invitadosGrupo' => 'nullable|string',
        ]);

        GrupoInvitados::create([
            'evento_id' => $this->eventoSeleccionado,
            'nombre_grupo' => $this->nombreGrupo,
            'invitados' => $this->invitadosGrupo,
        ]);

        $this->reset(['nombreGrupo', 'invitadosGrupo', 'showModalGrupo']);
        $this->dispatch('grupo-agregado'); // Emitir evento si necesitas actualizar la lista en otro componente
    }

    public function eliminarGrupo($grupoId)
    {
        GrupoInvitados::where('id', $grupoId)->delete();
    }

    public function render()
    {
        $grupos = GrupoInvitados::where('evento_id', $this->eventoSeleccionado)->get();

        return view('livewire.cliente.seguimiento-invitados', compact('grupos'));
    }
}
