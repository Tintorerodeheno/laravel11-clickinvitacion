<div class="p-4 md:p-6 relative">
    <!-- Alerta fija en la parte superior -->
    @if(session()->has('message'))
        <div x-data="{ show: true }"
             x-init="setTimeout(() => show = false, 4000)"
             x-show="show"
             x-transition:enter="transition ease-out duration-200"
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
    <h2 class="text-xl md:text-2xl text-center font-bold text-gray-900 mb-2">Crear nuevo evento</h2>
    <p class="text-gray-600 mb-4 text-center">
        En este apartado puedes crear un nuevo evento desde cero. 
        Elige el tipo de evento que mejor se ajuste a tus necesidades.
    </p>

    <!-- Selección de tipo de evento -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 md:gap-6">
        @foreach(['Boda', '15 Años', 'Comunión', 'Bautizo', 'Baby Shower', 'Cumpleaños', 'Empresas', 'Graduación'] as $evento)
            @php
                $eventoSlug = strtolower(str_replace([' ', 'á', 'é', 'í', 'ó', 'ú', 'ñ'], ['_', 'a', 'e', 'i', 'o', 'u', 'n'], $evento));
            @endphp
            <div class="bg-white rounded-lg shadow-md p-3 text-center">
                <img 
                    src="{{ asset('img/eventos/' . $eventoSlug . '-small.jpg') }}" 
                    srcset="
                        {{ asset('img/eventos/' . $eventoSlug . '-small.jpg') }} 480w,
                        {{ asset('img/eventos/' . $eventoSlug . '-large.jpg') }} 800w"
                    sizes="(max-width: 600px) 150px, 200px"
                    alt="{{ $evento }}" 
                    class="w-[200px] h-[220px] object-cover mx-auto mb-3 rounded-lg shadow"
                    loading="lazy">
                <button wire:click="seleccionarTipo('{{ $evento }}')"
                        @click="modalOpen = true"
                        class="w-full bg-purple-600 text-white py-2 rounded-md hover:bg-purple-700">
                    {{ $evento }}
                </button>
            </div>
        @endforeach
    </div>

    <!-- Modal Mejorado -->
    <div x-data="{ modalOpen: @entangle('modalOpen').live }">
        <template x-if="modalOpen">
            <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div x-show="modalOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
                    
                    <!-- Botón de cerrar -->
                    <button wire:click="cerrarModal" @click="modalOpen = false"
                            class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
                        ✖
                    </button>
                    
                    <!-- Contenido del Modal -->
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-4">
                        Cuéntanos de tu evento: {{ $tipoSeleccionado }}
                    </h3>
                    <form wire:submit.prevent="guardarEvento" class="space-y-4">
                        @if($tipoSeleccionado === 'Boda')
                            <div>
                                <label class="block text-gray-700">Nombre del Novio:</label>
                                <input type="text" wire:model="novio"
                                       class="w-full border-gray-300 rounded-md p-2 focus:ring-purple-500 focus:border-purple-500">
                            </div>
                            <div>
                                <label class="block text-gray-700">Nombre de la Novia:</label>
                                <input type="text" wire:model="novia"
                                       class="w-full border-gray-300 rounded-md p-2 focus:ring-purple-500 focus:border-purple-500">
                            </div>
                        @else
                            <div>
                                <label class="block text-gray-700">
                                    @if($tipoSeleccionado === '15 Años') Nombre de la Quinceañera
                                    @elseif($tipoSeleccionado === 'Bautizo') Nombre del protagonista
                                    @else Nombre del Evento @endif
                                </label>
                                <input type="text" wire:model="nombre"
                                       class="w-full border-gray-300 rounded-md p-2 focus:ring-purple-500 focus:border-purple-500">
                            </div>
                        @endif
        
                        <div>
                            <label class="block text-gray-700">Fecha del Evento:</label>
                            <input type="date" wire:model="fecha"
                                   class="w-full border-gray-300 rounded-md p-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>
        
                        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Crear Evento
                        </button>
                    </form>
                </div>
            </div>
        </template>
    </div>
</div>
