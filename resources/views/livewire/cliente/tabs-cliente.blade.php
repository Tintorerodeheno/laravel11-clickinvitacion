<div x-data="{ sidebarOpen: false, activeTab: @entangle('activeTab') }" class="flex h-screen">
    <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transition-transform duration-300 sm:translate-x-0 sm:fixed sm:top-0 sm:left-0 sm:h-screen sm:w-64 sm:flex sm:flex-col sm:justify-between">
        
        <div>
            <a href="{{ route('cliente.dashboard') }}" class="flex items-center justify-center p-4">
                <x-application-logo class="h-10 w-auto" />
            </a>

            <div class="flex justify-end px-4 sm:hidden">
                <button @click="sidebarOpen = false" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <nav class="flex flex-col space-y-4 px-4 pt-6">
                @if ($canCrearEvento)
                    <a href="#" @click.prevent="activeTab = 'crear-evento'; sidebarOpen = false"
                        :class="activeTab === 'crear-evento' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600'"
                        class="flex items-center p-2 rounded-md transition hover:bg-blue-700 hover:text-white">
                        <i class="fa-solid fa-plus mr-2"></i> Nuevo Evento
                    </a>
                @endif

                @if ($canVerEventos)
                    <a href="#" @click.prevent="activeTab = 'eventos-listado'; sidebarOpen = false"
                        :class="activeTab === 'eventos-listado' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600'"
                        class="flex items-center p-2 rounded-md transition hover:bg-blue-700 hover:text-white">
                        <i class="fa-regular fa-calendar mr-2"></i> Mis Eventos
                    </a>
                @endif

                @if ($canVerSeguimientoInvitados)
                    <a href="#" @click.prevent="activeTab = 'seguimiento-invitados'; sidebarOpen = false"
                        :class="activeTab === 'seguimiento-invitados' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600'"
                        class="flex items-center p-2 rounded-md transition hover:bg-blue-700 hover:text-white">
                        <i class="fa-solid fa-rectangle-list mr-2"></i> Invitados
                    </a>
                @endif

                @if ($canVerComunicados)
                    <a href="#" @click.prevent="activeTab = 'comunicados'; sidebarOpen = false"
                        :class="activeTab === 'comunicados' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600'"
                        class="flex items-center p-2 rounded-md transition hover:bg-blue-700 hover:text-white">
                        <i class="fa-solid fa-bullhorn mr-2"></i> Comunicados
                    </a>
                @endif

                @if ($canVerCuenta)
                    <a href="#" @click.prevent="activeTab = 'cuenta'; sidebarOpen = false"
                        :class="activeTab === 'cuenta' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600'"
                        class="flex items-center p-2 rounded-md transition hover:bg-blue-700 hover:text-white">
                        <i class="fa-solid fa-gear mr-2"></i> Cuenta
                    </a>
                @endif
                
                @if ($canVerPermissions)
                    <a href="#" @click.prevent="activeTab = 'roles-permissions'; sidebarOpen = false"
                        :class="activeTab === 'roles-permissions' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600'"
                        class="flex items-center p-2 rounded-md transition hover:bg-blue-700 hover:text-white">
                        <i class="fa-solid fa-user mr-2"></i> Roles y Permisos
                    </a>
                @endif
            </nav>
        </div>

        <div class="p-4 flex items-center justify-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center justify-center bg-red-600 text-white p-3 rounded-md transition hover:bg-red-700">
                    <i class="fas fa-power-off text-center"></i>
                </button>
            </form>
        </div>
    </div>

    <button @click="sidebarOpen = true" class="sm:hidden fixed top-4 left-4 z-40 p-2 bg-blue-600 text-white rounded">
        <i class="fas fa-bars"></i>
    </button>

    <div class="flex-1 p-4 sm:ml-64">
        @if ($canCrearEvento)
            <div x-show="activeTab === 'crear-evento'" class="transition-all duration-300">
                <livewire:nuevo-evento.crear-evento />
            </div>
        @endif

        @if ($canVerEventos)
            <div x-show="activeTab === 'eventos-listado'" class="transition-all duration-300">
                <livewire:cliente.eventos-listado />
            </div>
        @endif

        @if ($canVerEventos)
        <div x-show="activeTab === 'seguimiento-invitados'" class="transition-all duration-300">
            <livewire:cliente.seguimiento-invitados />
        </div>
    @endif

        @if ($canVerComunicados)
            <div x-show="activeTab === 'comunicados'" class="transition-all duration-300">
                <livewire:cliente.comunicados />
            </div>
        @endif

        @if ($canVerCuenta)
            <div x-show="activeTab === 'cuenta'" class="transition-all duration-300">
                <livewire:cliente.cuenta />
            </div>
        @endif

        @if ($canVerPermissions)
        <div x-show="activeTab === 'roles-permissions'" class="transition-all duration-300">
            <livewire:roles-permissions-manager />
        </div>
    @endif
    </div>
</div>


