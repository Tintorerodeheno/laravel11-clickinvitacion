<?php

namespace App\Livewire\Webevent\Diseno\DatosEvento;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class DatosEvento extends Component
{
    public $modalVisible = false;
    public $modalIndex = 0;

    protected $listeners = ['openDatosEvento' => 'showModal'];

    public function mount()
{
    logger("🟢 Componente DatosEvento montado.");
}


    public function showModal()
    {
        logger("📢 Evento recibido correctamente.");
    }

    public function closeModal()
    {
        Log::info("❌ Modal de Livewire cerrado");
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.webevent.diseno.datosevento.datos-evento');
    }
}
