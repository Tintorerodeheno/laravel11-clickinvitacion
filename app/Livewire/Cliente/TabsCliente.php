<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TabsCliente extends Component
{
    public $activeTab = 'crear-evento'; // Pestaña activa por defecto
    public $permissions = [];

    public function mount()
    {
        // Obtener permisos del usuario autenticado
        $this->permissions = Auth::user()->getPermissionNames()->toArray();

        // Si el usuario no tiene permisos para la pestaña activa, seleccionar una permitida
        if (!$this->hasPermission($this->activeTab)) {
            $this->activeTab = $this->getFirstAvailableTab();
        }
    }

    public function setActiveTab($tab)
    {
        if ($this->hasPermission($tab)) {
            $this->activeTab = $tab;
        }
    }

    private function hasPermission($tab)
    {
        $map = [
            'crear-evento' => 'ver-crear-evento',
            'eventos-listado' => 'ver-eventos-listado',
            'comunicados' => 'ver-comunicados',
            'roles-permissions' => 'manage users',
            'seguimiento-invitados' => 'ver-seguimiento-invitados',
            'cuenta' => 'ver-cuenta',
            
        ];

        return isset($map[$tab]) ? in_array($map[$tab], $this->permissions) : false;
    }

    private function getFirstAvailableTab()
    {
        $defaultTabs = ['crear-evento', 'eventos-listado', 'seguimiento-invitados', 'comunicados', 'cuenta', 'roles-permissions'];

        foreach ($defaultTabs as $tab) {
            if ($this->hasPermission($tab)) {
                return $tab;
            }
        }

        return 'crear-evento'; // Fallback si no tiene permisos
    }

    public function render()
    {
        return view('livewire.cliente.tabs-cliente', [
            'canCrearEvento' => in_array('ver-crear-evento', $this->permissions),
            'canVerEventos' => in_array('ver-eventos-listado', $this->permissions),
            'canVerComunicados' => in_array('ver-comunicados', $this->permissions),
            'canVerSeguimientoInvitados' => in_array('ver-seguimiento-invitados', $this->permissions),
            'canVerCuenta' => in_array('ver-cuenta', $this->permissions),
            'canVerPermissions' => in_array('manage users', $this->permissions),
        ]);
    }
}
