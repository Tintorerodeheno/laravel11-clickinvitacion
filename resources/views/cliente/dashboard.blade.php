@extends('layouts.cliente')

@section('title', 'Dashboard')

@section('content')


    @if ($view === 'crear-evento')
        @livewire('nuevo-evento.crear-evento')
    @elseif ($view === 'roles-permissions')
        @livewire('roles-permissions-manager')
    @elseif ($view === 'eventos-listado')
    @livewire('cliente.eventos-listado')
    @endif


@endsection
