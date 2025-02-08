<nav class="-mx-3 flex flex-1 justify-end">
    @auth
        @php
            $dashboardRoute = match (true) {
                auth()->user()->hasRole('super-admin') => route('super-admin.dashboard'),
                auth()->user()->hasRole('admin') => route('admin.dashboard'),
                auth()->user()->hasRole('vendedor') => route('vendedor.dashboard'),
                auth()->user()->hasRole('convenio') => route('convenio.dashboard'),
                auth()->user()->hasRole('cliente') => route('cliente.dashboard'),
                default => route('dashboard'), // Fallback si no tiene rol
            };
        @endphp

        <a
            href="{{ $dashboardRoute }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Log in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Register
            </a>
        @endif
    @endauth
</nav>
