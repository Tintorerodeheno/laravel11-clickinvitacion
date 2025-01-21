<div class="flex justify-center bg-gray-100 min-h-screen">
    <div class="w-full max-w-4xl p-6 bg-white rounded-lg shadow-md mt-16">
        <h2 class="text-2xl font-bold mb-4 text-center">Gestión de Roles y Permisos</h2>

        <!-- Seleccionar Usuario -->
        <div class="mb-4">
            <label for="user" class="block font-medium mb-2">Seleccionar Usuario</label>
            <select wire:model.live="selectedUser" id="user" class="w-full max-w-md border-gray-300 rounded-md shadow-sm">
                <option value="">Seleccionar Usuario</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        @if ($selectedUser)
            <!-- Tabla de Roles -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-2">Roles Disponibles</h3>
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Rol</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $role->name }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox"
                                               wire:click="toggleRole('{{ $role->name }}')"
                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                               {{ in_array($role->name, $userRoles) ? 'checked' : '' }}>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tabla de Permisos -->
            <div>
                <h3 class="text-xl font-semibold mb-2">Permisos Disponibles</h3>
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Permiso</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $permission->name }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox"
                                               wire:click="togglePermission('{{ $permission->name }}')"
                                               class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                                               @checked(in_array($permission->name, $userPermissions))>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Mensajes -->
        @if (session()->has('success'))
            <div id="success-message"
                 class="fixed top-1/4 left-1/2 transform -translate-x-1/2 bg-green-100 text-green-800 px-6 py-4 rounded shadow-lg animate-bounce">
                {{ session('success') }}
            </div>
        @elseif (session()->has('error'))
            <div id="error-message"
                 class="fixed top-1/4 left-1/2 transform -translate-x-1/2 bg-red-100 text-red-800 px-6 py-4 rounded shadow-lg animate-bounce">
                {{ session('error') }}
            </div>
        @endif
    </div>
    
</div>


