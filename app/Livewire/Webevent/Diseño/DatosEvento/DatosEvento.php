<?php

namespace App\Livewire\Webevent\Diseño\DatosEvento;

use Livewire\Component;

class DatosEvento extends Component
{
    public $modalVisible = false;
    public $modalIndex = 0;

    protected $listeners = ['openDatosEvento' => 'showModal'];

    public function showModal()
    {
        $this->modalVisible = true;
        $this->modalIndex = 0;
        logger("Modal abierto correctamente.");
    }

    public function closeModal()
    {
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.webevent.diseño.datosevento.datos-evento');
    }
}
