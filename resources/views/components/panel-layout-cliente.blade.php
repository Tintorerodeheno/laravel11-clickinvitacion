<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Cliente Panel')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css'])
    {{-- @php
        $menuItems = [
            [
                'label' => 'Nuevo Evento',
                'route' => route('cliente.dashboard', ['view' => 'crear-evento']),
                'permission' => 'ver-crear-evento',
                'icon' => '<i class="fa-solid fa-plus"></i>',
            ],
            [
                'label' => 'Roles y Permisos',
                'route' => route('cliente.dashboard', ['view' => 'roles-permissions']),
                'permission' => 'manage permissions',
                'icon' => '<i class="fas fa-user-shield"></i>',
            ],
            [
                'label' => 'Mis Eventos',
                'route' => route('cliente.dashboard', ['view' => 'eventos-listado']),
                'permission' => 'ver-eventos-listado',
                'icon' => '<i class="fa-regular fa-calendar"></i>',
            ],
            
        ];
    @endphp --}}
</head>

<body class="bg-gray-100">
    {{-- <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <nav class="fixed inset-y-0 left-0 w-64 bg-slate-300 text-stone-900 shadow-2xl 
           transform transition-transform duration-300 sm:relative sm:translate-x-0 
           flex flex-col justify-between h-full":class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }"> 
         

  <!-- Encabezado alineado arriba -->
<div class="relative flex items-center justify-center h-16 px-4 pt-7">
    <!-- Logo centrado -->
    <a href="{{ route('cliente.dashboard') }}" class="flex items-center space-x-2">
        <x-application-logo class="h-10 w-auto" />
    </a>

    <!-- Botón de cierre, fijo en la derecha -->
    <button @click="sidebarOpen = false" 
            class="absolute right-4 sm:hidden p-2 text-white rounded-md">
        <i class="fas fa-times"></i>
    </button>
</div>


    <!-- Lista de menú centrada verticalmente -->
    <ul class="flex flex-col justify-center flex-grow space-y-2">
        @foreach($menuItems as $item)
            @if(is_null($item['permission']) || auth()->user()->can($item['permission']))
                <li class="px-4 pt-5">
                    <a href="{{ $item['route'] }}" 
                        class="flex items-center space-x-3 text-white bg-gradient-to-r from-purple-600 to-indigo-500 
                               hover:from-indigo-500 hover:to-purple-600 transition-all duration-300 
                               rounded-lg shadow-md px-4 py-3">
                        
                        <span class="w-8 h-8 flex justify-center items-center bg-white bg-opacity-20 rounded-lg text-lg">
                            {!! $item['icon'] !!}
                        </span>
                
                        <span class="text-base font-semibold tracking-wide">
                            {{ $item['label'] }}
                        </span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>


        <!-- Contenido Principal -->
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow py-4 px-6 flex justify-between items-center">
                <!-- Botón de apertura del sidebar: visible solo en móviles -->
                <button @click="sidebarOpen = true"
                    class="sm:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-200 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <!-- Icono de tres puntos horizontales -->
                        <circle cx="5" cy="12" r="2" fill="currentColor"/>
                        <circle cx="12" cy="12" r="2" fill="currentColor"/>
                        <circle cx="19" cy="12" r="2" fill="currentColor"/>
                    </svg>
                </button>
                <h1 class="text-xl font-semibold">@yield('title', 'Dashboard')</h1>
                <!-- Dropdown de Perfil y Log Out (estructura original) -->
                <div class="hidden sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name"></div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                <!-- Menú hamburguesa para móviles (dropdown alternativo, si es necesario) -->
                <div x-data="{ openMobile: false }" class="sm:hidden relative">
                    <button @click="openMobile = !openMobile"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': openMobile, 'inline-flex': !openMobile }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                            <path :class="{ 'hidden': !openMobile, 'inline-flex': openMobile }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div x-show="openMobile" x-cloak
                        class="absolute top-16 right-0 w-48 bg-white shadow-lg rounded-md py-1 z-50"
                        @click.away="openMobile = false" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ __('Profile') }}
                        </a>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </header> --}}
            <main class="flex-1 overflow-y-auto bg-gray-100">
                @yield('content')
                {{ $slot }}
                
            </main>
        {{-- </div>
    </div> --}}
    @livewireScripts
</body>

</html>
