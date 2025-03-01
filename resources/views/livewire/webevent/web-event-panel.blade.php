<div class="h-screen flex" x-data="{ activeModal: null, innerModal: false }">
    <!-- Sidebar flotante con botones centrados -->
    <div class="fixed left-0 top-1/2 transform -translate-y-1/2 flex flex-col space-y-2">

        <!-- Botón Diseño -->
        <button @click="activeModal = 'diseno'"
            class="relative group flex items-center w-12 h-12 bg-gray-900 text-white rounded-r-full transition-all duration-300 hover:w-48">
            <i class="fa-solid fa-palette absolute left-3"></i>
            <span class="ml-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Diseño</span>
        </button>

        <!-- Botón RSVP -->
        <button @click="activeModal = 'rsvp'"
            class="relative group flex items-center w-12 h-12 bg-gray-900 text-white rounded-r-full transition-all duration-300 hover:w-48">
            <i class="fa-solid fa-envelope absolute left-3"></i>
            <span class="ml-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300">RSVP</span>
        </button>

        <!-- Botón Link -->
        <button @click="activeModal = 'link'"
            class="relative group flex items-center w-12 h-12 bg-gray-900 text-white rounded-r-full transition-all duration-300 hover:w-48">
            <i class="fa-solid fa-link absolute left-3"></i>
            <span class="ml-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Link</span>
        </button>

        <!-- Botón Prueba -->
        <button @click="activeModal = 'prueba'"
            class="relative group flex items-center w-12 h-12 bg-gray-900 text-white rounded-r-full transition-all duration-300 hover:w-48">
            <i class="fa-solid fa-vial absolute left-3"></i>
            <span class="ml-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Prueba</span>
        </button>

        <!-- Botón Panel Cliente -->
        <button @click="activeModal = 'panel-cliente'"
            class="relative group flex items-center w-12 h-12 bg-gray-900 text-white rounded-r-full transition-all duration-300 hover:w-48">
            <i class="fa-solid fa-user absolute left-3"></i>
            <span class="ml-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Panel Cliente</span>
        </button>
    </div>

    <!-- Contenedor Principal -->
    <div class="flex-1 p-8">
        <h1 class="text-2xl font-bold">Vista Previa de la Invitación</h1>
        <div class="border mt-4 p-4">
            @if (in_array('cabecera', $selectedSections))
                <livewire:webevent.cabecera />
            @endif
            @if (in_array('cuenta-regresiva', $selectedSections))
                <livewire:webevent.cuenta-regresiva />
            @endif
            @if (in_array('direccion', $selectedSections))
                <livewire:webevent.direccion />
            @endif
        </div>
    </div>

    <!-- MODAL PRINCIPAL -->
    <div x-show="activeModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
        <div class="bg-white w-80 p-4 rounded shadow-lg">
            <div class="flex justify-between items-center border-b pb-2">
                <h2 class="text-lg font-semibold">
                    <template x-if="activeModal === 'diseno'"> <span>Diseño</span> </template>
                    <template x-if="activeModal === 'rsvp'"> <span>RSVP</span> </template>
                    <template x-if="activeModal === 'link'"> <span>Configuración de Link</span> </template>
                    <template x-if="activeModal === 'prueba'"> <span>Prueba</span> </template>
                    <template x-if="activeModal === 'panel-cliente'"> <span>Panel del Cliente</span> </template>
                </h2>
                <button @click="activeModal = null" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>

            <!-- Contenido del modal Diseño -->
            <div x-show="activeModal === 'diseno'" class="mt-4 space-y-2">
                <!-- Botón principal ocupando todo el ancho -->
                <button @click="$dispatch('closeWebEventPanel'); Livewire.dispatch('openDatosEvento')" 
        class="bg-blue-500 text-white px-4 py-2 rounded">
    Datos del evento
</button>
                

                <!-- Contenedor con grid para pares de botones -->
                <div class="grid grid-cols-2 gap-2">
                    <!-- Botón Secciones -->
                    <button @click="innerModal = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Secciones
                    </button>

                    <!-- Botón Idioma -->
                    <button @click="innerModal = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Idioma
                    </button>

                    <!-- Botón Texto -->
                    <button @click="innerModal = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Texto
                    </button>

                    <!-- Botón Fotos -->
                    <button @click="innerModal = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Fotos
                    </button>

                    <!-- Botón Colores -->
                    <button @click="innerModal = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Colores
                    </button>

                    <!-- Botón Música -->
                    <button @click="innerModal = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Música
                    </button>

                    <!-- Botón Fuente -->
                    <button @click="innerModal = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Fuente
                    </button>

                    <!-- Botón Decoraciones -->
                    <button @click="innerModal = true" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Decoraciones
                    </button>
                </div>
            </div>



            <!-- Contenido de otros modales -->
            <div x-show="activeModal === 'rsvp'" class="mt-4">
                <p>Aquí irá el contenido del RSVP.</p>
            </div>
            <div x-show="activeModal === 'link'" class="mt-4">
                <p>Aquí se configurará el enlace de la invitación.</p>
            </div>
            <div x-show="activeModal === 'prueba'" class="mt-4">
                <p>Opciones para pruebas de la invitación.</p>
            </div>
            <div x-show="activeModal === 'panel-cliente'" class="mt-4">
                <p>Configuraciones del panel del cliente.</p>
            </div>
        </div>
    </div>

    <!-- MODAL INTERNO (SECCIONES) -->
    <div x-show="innerModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
        <div class="bg-white w-80 p-4 rounded shadow-lg">
            <div class="flex justify-between items-center border-b pb-2">
                <h2 class="text-lg font-semibold">Secciones</h2>
                <button @click="innerModal = false" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>

            <div class="mt-4 space-y-2">
                <label class="flex items-center">
                    <input type="checkbox" wire:model.live="selectedSections" value="cabecera">
                    <span class="ml-2">Cabecera</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" wire:model.live="selectedSections" value="cuenta-regresiva">
                    <span class="ml-2">Cuenta Regresiva</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" wire:model.live="selectedSections" value="direccion">
                    <span class="ml-2">Dirección del Evento</span>
                </label>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        Livewire.on('openDatosEvento', () => {
            document.getElementById('webEventPanelModal')?.classList.add('hidden');
        });
    });
    </script>
    
