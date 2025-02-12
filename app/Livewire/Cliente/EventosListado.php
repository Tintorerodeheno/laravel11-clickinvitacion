<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;

class EventosListado extends Component
{
    public function eliminarEvento($id)
    {
        $evento = Evento::where('id', $id)->where('user_id', Auth::id())->first();

        if ($evento) {
            $evento->delete();
            session()->flash('message', 'Evento eliminado correctamente.');
        }
    }

    public function render()
    {
        $eventos = Evento::where('user_id', Auth::id())->latest()->get();

        return view('livewire.cliente.eventos-listado', compact('eventos'));
    }
}
