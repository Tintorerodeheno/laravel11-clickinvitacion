@extends('components.plantillas.base')

@section('contenido-especifico')
    <h1>Plantilla de graduacion</h1>
    <p>Bienvenido a la invitación digital de un evento tipo graduacion.</p>
    @include('components.plantillas._seccion1')
    @include('components.plantillas._seccion2')
@endsection
