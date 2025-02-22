<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Comunicado;

class Comunicados extends Component
{
    public $comunicados, $nombre_remitente, $asunto, $contenido, $comunicado_id;
    public $mostrarModal = false;

    public function mount()
    {
        $this->cargarComunicados();
    }

    public function cargarComunicados()
    {
        $this->comunicados = Comunicado::latest()->get();
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->mostrarModal = true;
    }

    public function editar($id)
    {
        $comunicado = Comunicado::findOrFail($id);
        $this->comunicado_id = $comunicado->id;
        $this->nombre_remitente = $comunicado->nombre_remitente;
        $this->asunto = $comunicado->asunto;
        $this->contenido = $comunicado->contenido;
        $this->mostrarModal = true;
    }

    public function guardar()
    {
        $this->validate([
            'nombre_remitente' => 'required',
            'asunto' => 'required',
            'contenido' => 'required',
        ]);

        Comunicado::updateOrCreate(
            ['id' => $this->comunicado_id],
            [
                'nombre_remitente' => $this->nombre_remitente,
                'asunto' => $this->asunto,
                'contenido' => $this->contenido,
            ]
        );

        $this->cerrarModal();
        $this->cargarComunicados();
    }

    public function eliminar($id)
    {
        Comunicado::findOrFail($id)->delete();
        $this->cargarComunicados();
    }

    public function cerrarModal()
    {
        $this->mostrarModal = false;
        $this->limpiarCampos();
    }

    private function limpiarCampos()
    {
        $this->comunicado_id = null;
        $this->nombre_remitente = '';
        $this->asunto = '';
        $this->contenido = '';
    }

    public function render()
    {
        return view('livewire.cliente.comunicados');
    }
}