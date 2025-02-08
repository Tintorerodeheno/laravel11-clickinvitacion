<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Graficas extends Component
{
    public function mount()
    {
        // Verifica que el usuario tenga el permiso 'ver-graficas'
        if (!Auth::user()->can('ver-graficas')) {
            abort(403, 'No tienes permisos para ver esta sección.');
        }
    }

    public function render()
    {
        // Usa el layout 'layouts.super-admin' para renderizar este componente.
        return view('livewire.admin.graficas')->layout('layouts.super-admin');
    }
}

