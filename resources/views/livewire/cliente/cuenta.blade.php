<div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <!-- Título -->
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">
        Información sobre mi cuenta
    </h2>

    <!-- Descripción -->
    <p class="text-gray-600 text-center mb-6">
        En esta sección tienes a tu disposición toda la información personal y la posibilidad de configurar los parámetros de tu cuenta de ClickEvent. Es importante tener configurado correctamente tu región/país para una experiencia de usuario ideal y sin errores dentro de la app.
    </p>

    <!-- Bienvenida al usuario -->
    <h3 class="text-xl font-medium text-gray-700 text-center mb-6">
        Bienvenido, {{ $user->name ?? 'Usuario' }}
    </h3>

    <!-- Sección de selección de idioma -->
    <div class="border-t border-b py-4 text-center">
        <label for="language" class="block text-gray-700 font-semibold mb-2">Selecciona idioma:</label>
        <select id="language" class="p-2 border rounded-lg">
            <option selected>Español</option>
            <option>Inglés</option>
            <option>Francés</option>
        </select>
    </div>

    <!-- Sección de eliminar cuenta -->
    <div class="mt-6 text-center">
        <a href="#" class="text-red-600 hover:underline font-semibold">
            Eliminar mi cuenta
        </a>
    </div>
</div>
