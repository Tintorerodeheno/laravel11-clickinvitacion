@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
@php

@endphp
@if ($view === 'dashboard-metrics')
<livewire:admin.dashboard-metrics />
@elseif ($view === 'roles-permissions')
{{-- <livewire:roles-permissions-manager /> --}}
@livewire('roles-permissions-manager')
@endif

@if(auth()->user()->can('ver-graficas'))
    <livewire:admin.graficas />
@endif

@endsection
