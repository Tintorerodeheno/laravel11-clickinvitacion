<div class="p-6">
    <!-- Alerta de Mensajes -->
    @if(session()->has('message'))
        <div x-data="{ show: true }"
             x-init="setTimeout(() => show = false, 4000)"
             x-show="show"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-[-10px]"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-[-10px]"
             class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            {{ session('message') }}
        </div>
    @endif

    <!-- Encabezado -->
    <h2 class="text-2xl text-center font-bold text-gray-900 mb-2">Listado de mis eventos</h2>
    <p class="text-gray-600 mb-6 text-center">
        En este apartado vas a encontrar todos tus eventos creados. Puedes editar tu evento antes, durante e incluso después de efectuar la activación de tu Invitación Web.
    </p>

    

    <!-- Botón Crear Evento -->
    <div class="flex justify-center mb-6">
        <a href="{{ url('/cliente/dashboard/crear-evento') }}" 
           class="bg-purple-600 text-white px-4 py-2 rounded-md flex items-center gap-2 hover:bg-purple-700 shadow-lg">
            <i class="fas fa-plus"></i> Crear nuevo evento
        </a>
    </div>

    <!-- Tabla de Eventos -->
    <div class="overflow-x-auto">
        <div class="space-y-4">
            @foreach($eventos as $evento)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <!-- Información del evento -->
                        <div class="text-center sm:text-left">
                            <p class="text-lg font-semibold text-gray-900">{{ $evento->tipo_evento }}</p>
                            <p class="text-gray-600">{{ $evento->nombre ?? $evento->novio . ' & ' . $evento->novia }}</p>
                            <p class="text-sm text-gray-500">Fecha: {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d/m/Y') }}</p>
                            <p class="text-xs text-gray-400">Creado: {{ \Carbon\Carbon::parse($evento->created_at)->diffForHumans() }}</p>
                        </div>

                        <!-- Botones de acción -->
                        <div class="flex gap-2">
                            <a href="#" class="bg-blue-600 text-white px-3 py-2 rounded-md flex items-center gap-1 hover:bg-blue-700 shadow">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ url('/web/dashboard') }}" class="bg-green-600 text-white px-3 py-2 rounded-md flex items-center gap-1 hover:bg-green-700 shadow">
                                <i class="fas fa-check"></i> Activar Web
                            </a>
                            <a href="#" class="bg-yellow-500 text-white px-3 py-2 rounded-md flex items-center gap-1 hover:bg-yellow-600 shadow">
                                <i class="fas fa-share-alt"></i> Compartir
                            </a>
                            <button wire:click="eliminarEvento({{ $evento->id }})" 
                                    class="bg-red-600 text-white p-3 rounded-md hover:bg-red-700 shadow">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($eventos->isEmpty())
            <p class="text-center text-gray-500 mt-6">No tienes eventos creados aún.</p>
        @endif
    </div>
</div>
