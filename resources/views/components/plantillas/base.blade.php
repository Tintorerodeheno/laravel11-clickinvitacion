@extends('layouts.app')

@section('content')
    @include('components.plantillas._header')

    <div class='container'>
        <h1>Base de la Invitación</h1>
        <p>Esta es la estructura base de todas las plantillas de invitación.</p>
        <hr>
        @yield('contenido-especifico')
    </div>

    @include('components.plantillas._footer')
@endsection
