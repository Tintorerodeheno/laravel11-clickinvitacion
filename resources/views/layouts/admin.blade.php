
{{-- resources/views/admin/dashboard.blade.php --}}

@php
@endphp
<x-panel-layout-admins>
    @if ($view === 'dashboard-metrics')
      <livewire:admin.dashboard-metrics />
    @elseif ($view === 'roles-permissions')
      @livewire('roles-permissions-manager')
    @endif
    @if(auth()->user()->can('ver-graficas'))
    <livewire:admin.graficas />
@endif
  </x-panel-layout-admins>