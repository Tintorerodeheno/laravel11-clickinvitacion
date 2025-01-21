<div class="max-w-md mx-auto mt-10">
    <h1 class="text-2xl font-bold text-center">Hola desde formulario Registro</h1>

    <form wire:submit.prevent="register" class="space-y-4 mt-4">

        Hola desde formulario Registro
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium">Nombre</label>
            <input id="name" type="text" wire:model="name" class="w-full mt-1 border rounded-md" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium">Correo electrónico</label>
            <input id="email" type="email" wire:model="email" class="w-full mt-1 border rounded-md" required>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium">Contraseña</label>
            <input id="password" type="password" wire:model="password" class="w-full mt-1 border rounded-md" required>
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium">Confirmar Contraseña</label>
            <input id="password_confirmation" type="password" wire:model="password_confirmation" class="w-full mt-1 border rounded-md" required>
            @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
            Registrarse
        </button>
    </form>
</div>
