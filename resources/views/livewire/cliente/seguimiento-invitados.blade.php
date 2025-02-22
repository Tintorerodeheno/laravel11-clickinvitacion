<div class="p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-center text-2xl font-bold mb-4">Seguimiento de mis invitados</h2>
    <p class="text-center text-gray-600 mb-6">
        Administra los grupos de invitados de tus eventos y realiza un seguimiento de su asistencia.
    </p>

    <!-- Seleccionar evento -->
    <div class="flex items-center justify-between">
        <div class="w-2/3">
            <label class="block text-gray-700 font-bold mb-1">Seleccionar evento:</label>
            <select wire:model.live="eventoSeleccionado" class="w-full p-2 border rounded">
                <option value="">Seleccione un evento</option>
                @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}">
                        @if($evento->tipo_evento === 'Boda')
                            {{ $evento->tipo_evento }} - {{ $evento->novio }} & {{ $evento->novia }} ({{ $evento->fecha_evento }})
                        @else
                            {{ $evento->tipo_evento }} - {{ $evento->nombre }} ({{ $evento->fecha_evento }})
                        @endif
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Checkboxes (Siempre visibles) -->
    <div class="flex space-x-4 mt-4">
        <label class="flex items-center">
            <input type="checkbox" wire:model.live="mostrarGrupos" class="mr-2"> Grupos de invitados
        </label>
        <label class="flex items-center opacity-50 cursor-not-allowed">
            <input type="checkbox" disabled class="mr-2"> Invitados Confirmados
        </label>
        <label class="flex items-center opacity-50 cursor-not-allowed">
            <input type="checkbox" disabled class="mr-2"> Lista de música
        </label>
    </div>

    <!-- Botón Agregar Grupo -->
    @if($mostrarGrupos && $eventoSeleccionado)
        <div class="mt-6">
            <button wire:click="abrirModalGrupo"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-plus"></i> Agregar Grupo
            </button>
        </div>

       <!-- Lista de Grupos de Invitados -->
<div class="mt-4 flex justify-center">
    <div class="w-full max-w-5xl"> 
        <h3 class="text-xl font-semibold text-blue-600 text-center">Lista de Grupos de Invitados</h3>

        <div class="mt-4 space-y-3">
            @foreach($grupos as $grupo)
                <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-200 transition-all hover:shadow-xl flex flex-wrap items-center justify-between">
                    <!-- Nombre del grupo -->
                    <div class="w-full md:w-1/4 p-2">
                        <h4 class="text-lg font-bold text-gray-800">{{ $grupo->nombre_grupo }}</h4>
                    </div>

                    <!-- Invitados -->
                    <div class="w-full md:w-1/4 p-2">
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold text-blue-600">Invitados:</span> {{ $grupo->invitados }}
                        </p>
                    </div>

                    <!-- Fecha de Creación -->
                    <div class="w-full md:w-1/4 p-2">
                        <span class="text-xs text-gray-500">Fecha de Creación:{{ $grupo->created_at->format('d/m/Y') }}</span>
                    </div>

                    <!-- Botones de acción -->
                    <div class="w-full md:w-1/4 flex md:flex-col md:space-y-2 md:items-stretch justify-end space-x-2 md:space-x-0 p-2">
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm flex items-center justify-center">
                            <i class="fas fa-eye mr-1"></i> Ver
                        </button>
                        <button class="bg-green-500 text-white px-3 py-1 rounded text-sm flex items-center justify-center">
                            <i class="fa-solid fa-upload mr-1"></i> Activar Web
                        </button>
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded text-sm flex items-center justify-center">
                            <i class="fas fa-share mr-1"></i> Compartir
                        </button>
                        <button wire:click="eliminarGrupo({{ $grupo->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded text-sm flex items-center justify-center hover:bg-red-700">
                            <i class="fas fa-trash mr-1"></i> Eliminar
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>





    @endif

    <!-- Modal Agregar Grupo -->
    @if($showModalGrupo)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded shadow-lg w-96">
                <h3 class="text-xl font-bold mb-4">Nuevo Grupo de Invitados</h3>

                <label class="block text-gray-700">Nombre del Grupo</label>
                <input type="text" wire:model.live="nombreGrupo" placeholder="Escribe el nombre del grupo"
                    class="w-full p-2 border rounded mb-3">

                <label class="block text-gray-700">Invitados del Grupo</label>
                <textarea wire:model.live="invitadosGrupo" placeholder="Escribe los nombres separados por comas"
                    class="w-full p-2 border rounded mb-3"></textarea>

                <div class="flex justify-end space-x-2">
                    <button wire:click="$set('showModalGrupo', false)" class="bg-gray-500 text-white px-4 py-2 rounded">
                        Cancelar
                    </button>
                    <button wire:click="guardarGrupo" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Guardar Grupo
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
