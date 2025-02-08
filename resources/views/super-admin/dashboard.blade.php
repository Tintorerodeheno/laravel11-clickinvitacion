@extends('layouts.super-admin')

@section('title', 'Dashboard')

@section('content')
    @if ($view === 'dashboard-metrics')
        <livewire:admin.dashboard-metrics />
    @elseif ($view === 'roles-permissions')
        @livewire('roles-permissions-manager')
    @elseif ($view === 'graficas')
        @livewire('admin.graficas')
    @endif
@endsection

