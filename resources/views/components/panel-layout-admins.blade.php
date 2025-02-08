<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin Panel')</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Styles -->
  @vite(['resources/css/app.css'])
  @php
  $menuItems = [
      [
          'label'     => 'Dashboard',
          'route'     => route('super-admin.dashboard'),
          'permission'=> null,
          'icon'      => '<i class="fas fa-home"></i>',
      ],
      [
          'label'     => 'Roles y Permisos',
          'route'     => route('super-admin.dashboard', ['view' => 'roles-permissions']),
          'permission'=> 'manage permissions',
          'icon'      => '<i class="fas fa-user-shield"></i>',
      ],
      [
          'label'     => 'Gráficas',
          'route'     => route('super-admin.dashboard', ['view' => 'graficas']),
          'permission'=> 'ver-graficas',
          'icon'      => '<i class="fas fa-chart-bar"></i>',
      ],
  ];
  @endphp
  


</head>
<body class="bg-gray-100">
  <!-- Contenedor principal con Alpine para controlar el sidebar -->
  <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">
    
    <!-- Sidebar: fijo en pantallas grandes; en móviles se despliega con transición -->
    <nav class="fixed inset-y-0 left-0 z-50 h-screen bg-purple-100/95 border-purple-500 border-r-2   text-amber-950 transform transition-transform duration-300
                sm:relative sm:translate-x-0"
         :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
      <!-- Encabezado del Sidebar -->
      <div class="flex items-center justify-between h-16 px-4 bg-Purple-500 border-purple-500 ">
        <!-- Logo y texto (si está abierto o en pantallas grandes se muestran siempre) -->
        <a href="{{ route('super-admin.dashboard') }}" class="flex items-center">
          <x-application-logo class="block h-16 w-auto fill-current text-gray-800" />
          <span class="ml-2 font-bold text-lg">{{ auth()->user()->panel_role_text }}</span>
        </a>
        <!-- Botón de cierre: visible solo en móviles -->
        <button @click="sidebarOpen = false" class="sm:hidden p-2 rounded-md text-gray-400 hover:text-white focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
      
      <!-- Menú del Sidebar -->
      <ul class="mt-4">
    @foreach($menuItems as $item)
        @if(is_null($item['permission']) || auth()->user()->can($item['permission']))
            <li class="px-4 py-2">
                <a href="{{ $item['route'] }}" class="flex items-center space-x-3 text-amber-950 hover:text-white hover:bg-gray-700 rounded-md px-3 py-2">
                    <span class="w-6 h-6 flex justify-center items-center">
                        {!! $item['icon'] !!}
                    </span>
                    <span class="text-sm font-medium">{{ $item['label'] }}</span>
                </a>
            </li>
        @endif
    @endforeach
</ul>

    
    
    </nav>
    
    <!-- Área de contenido principal -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white shadow py-4 px-6 flex justify-between items-center">
        <!-- Botón de apertura del sidebar: visible solo en móviles -->
        <button @click="sidebarOpen = true" class="sm:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-200 focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <!-- Icono hamburguesa -->
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
          </svg>
        </button>
        <h1 class="text-xl font-semibold">@yield('title', 'Dashboard')</h1>
        <!-- Dropdown de Perfil y Log Out (estructura original) -->
        <div class="hidden sm:flex sm:items-center">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none transition ease-in-out duration-150">
                <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name"></div>
                <div class="ml-1">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
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
          <button @click="openMobile = !openMobile" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path :class="{ 'hidden': openMobile, 'inline-flex': !openMobile }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
              <path :class="{ 'hidden': !openMobile, 'inline-flex': openMobile }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
          <div x-show="openMobile" x-cloak class="absolute top-16 right-0 w-48 bg-white shadow-lg rounded-md py-1 z-50"
               @click.away="openMobile = false"
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="opacity-0 transform scale-95"
               x-transition:enter-end="opacity-100 transform scale-100"
               x-transition:leave="transition ease-in duration-75"
               x-transition:leave-start="opacity-100 transform scale-100"
               x-transition:leave-end="opacity-0 transform scale-95">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
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
      </header>
      
      <!-- Área de Contenido -->
      <main class="flex-1 overflow-y-auto bg-gray-100 p-6">
        @yield('content')
        {{ $slot }}
      </main>
    </div>
  </div>
  @livewireScripts
</body>
</html>
