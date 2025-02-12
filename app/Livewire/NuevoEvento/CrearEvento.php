<?php


namespace App\Livewire\NuevoEvento;

use Livewire\Component;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth; // ✅ IMPORTAR Auth

class CrearEvento extends Component
{
    public $tipoSeleccionado = null;
    public $nombre;
    public $novio;
    public $novia;
    public $fecha;
    public $modalOpen = false;

    public function seleccionarTipo($tipo)
    {
        $this->tipoSeleccionado = $tipo;
        $this->modalOpen = true;
    }

    public function cerrarModal()
    {
        $this->modalOpen = false;
        $this->tipoSeleccionado = null;
        $this->reset(['nombre', 'novio', 'novia', 'fecha']);
    }

    public function guardarEvento()
{
    $rules = [
        'fecha' => 'required|date',
    ];

    if ($this->tipoSeleccionado === 'Boda') {
        $rules['novio'] = 'required|string|max:255';
        $rules['novia'] = 'required|string|max:255';
    } else {
        $rules['nombre'] = 'required|string|max:255';
    }

    $this->validate($rules);

    // ✅ Asegurar que user_id se pase correctamente
    Evento::create([
        'user_id'      => Auth::id(), // 💡 Agregamos el usuario autenticado
        'tipo_evento'  => $this->tipoSeleccionado,
        'nombre'       => $this->tipoSeleccionado === 'Boda' ? null : $this->nombre,
        'novio'        => $this->tipoSeleccionado === 'Boda' ? $this->novio : null,
        'novia'        => $this->tipoSeleccionado === 'Boda' ? $this->novia : null,
        'fecha_evento' => $this->fecha,
    ]);

    session()->flash('message', '¡Evento creado con éxito!');

    $this->reset(['tipoSeleccionado', 'nombre', 'novio', 'novia', 'fecha', 'modalOpen']);
}


    public function render()
    {
        return view('livewire.nuevo-evento.crear-evento');
    }
}
