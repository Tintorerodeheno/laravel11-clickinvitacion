<div class="max-w-4xl mx-auto p-4">
    <h2 class="text-2xl font-bold text-center text-gray-800">Comunicados para los invitados</h2>
    <p class="text-center text-gray-600 mt-2">
        ¿Necesitas enviar algún aviso importante sobre tu evento a todos los invitados?
        En este apartado puedes enviar de forma masiva y fácil mensajes a todos los invitados
        que hayan respondido a las invitaciones correspondientes.
    </p>

    <button wire:click="crear" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded shadow flex items-center">
        <i class="fa-solid fa-envelopes-bulk mr-2"></i> Crear Comunicado
    </button>

    <!-- Listado de Comunicados -->
    <div class="mt-6">
        @foreach($comunicados as $comunicado)
            <div class="bg-white shadow-lg rounded-lg p-4 mb-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-700">{{ $comunicado->asunto }}</h3>
                    <span class="text-gray-500 text-sm">{{ $comunicado->created_at->format('d/m/Y') }}</span>
                </div>
                <p class="text-gray-600 mt-2">{{ $comunicado->contenido }}</p>
                <div class="flex justify-end space-x-2 mt-4">
                    <button wire:click="editar({{ $comunicado->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded shadow">
                        <i class="fa-solid fa-edit"></i> Editar
                    </button>
                    <button class="bg-green-500 text-white px-3 py-1 rounded shadow">
                        <i class="fa-solid fa-paper-plane"></i> Enviar
                    </button>
                    <button wire:click="eliminar({{ $comunicado->id }})" class="bg-red-500 text-white px-3 py-1 rounded shadow">
                        <i class="fa-solid fa-trash"></i> Eliminar
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    @if($mostrarModal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h3 class="text-lg font-bold text-gray-700 text-center">
                    {{ $comunicado_id ? 'Editar Comunicado' : 'Crea un Comunicado' }}
                </h3>

                <div class="mt-4">
                    <label class="block text-gray-700">Nombre del Remitente</label>
                    <input type="text" wire:model="nombre_remitente" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Asunto</label>
                    <input type="text" wire:model="asunto" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Contenido del mensaje</label>
                    <textarea wire:model="contenido" class="w-full border rounded px-3 py-2 h-24"></textarea>
                </div>

                <div class="mt-4 flex justify-between">
                    <button wire:click="cerrarModal" class="bg-gray-500 text-white px-4 py-2 rounded shadow">Cancelar</button>
                    <button wire:click="guardar" class="bg-blue-600 text-white px-4 py-2 rounded shadow">Guardar Comunicado</button>
                </div>
            </div>
        </div>
    @endif
</div>
