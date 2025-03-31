<div class="bg-white shadow-lg rounded-lg p-6">
    {{-- Título del evento --}}
    <h2 class="text-2xl font-bold text-gray-800">{{ $invitacion->titulo }}</h2>

    {{-- Información del evento --}}
    <p class="text-gray-600 mt-2">{{ $invitacion->mensaje }}</p>

    <div class="mt-4">
        <p><strong>Fecha:</strong> {{ $invitacion->fecha_evento->format('d/m/Y h:i A') }}</p>
        <p><strong>Ubicación:</strong> {{ $invitacion->ubicacion ?? 'Por definir' }}</p>
    </div>

    {{-- Botón para ver más detalles --}}
    <div class="mt-6">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Ver detalles
        </button>
    </div>
</div>
