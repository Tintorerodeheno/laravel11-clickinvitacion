<?php

namespace App\Livewire\Webevent;

use Livewire\Component;

class WebEventPanel extends Component
{
    public $selectedSections = []; // Almacena las secciones seleccionadas

    public function render()
    {
        return view('livewire.webevent.web-event-panel');
    }
}

