<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cuenta extends Component
{
    public function render()
    {
        return view('livewire.cliente.cuenta', [
            'user' => Auth::user()
        ]);
    }
}
