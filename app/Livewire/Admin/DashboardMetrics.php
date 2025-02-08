<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class DashboardMetrics extends Component
{
    public $totalSales = 0;
    public $salesByVendors = 0;
    public $directClients = 0;

    public function mount()
    {
        // Cargar datos iniciales (simulados por ahora)
        $this->totalSales = 5000;
        $this->salesByVendors = 2500;
        $this->directClients = 20;
    }

    public function render()
    {
        return view('livewire.admin.dashboard-metrics');
    }
}
