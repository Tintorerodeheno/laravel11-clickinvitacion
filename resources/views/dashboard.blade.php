<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pergamino con Alpine.js</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none; }

        .scroll {
            transform-origin: top;
        }
    </style>
</head>
<body class="bg-gray-900">

    <div class="relative flex items-center justify-center h-screen bg-cover bg-center" 
         style="background-image: url('https://images.unsplash.com/photo-1519222970733-f546218fa6d7?w=1600');" 
         x-data="{ open: false }">
        
        <!-- Capa Oscura -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Botón de apertura -->
        <button @click="open = true" 
                class="absolute bottom-10 left-1/2 transform -translate-x-1/2 px-6 py-3 text-white bg-red-600 rounded-lg text-lg font-semibold transition hover:bg-red-700">
            Abrir Invitación
        </button>

        <!-- Pergamino -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 scale-y-0"
             x-transition:enter-end="opacity-100 scale-y-100"
             x-cloak
             class="scroll relative w-[85%] max-w-4xl bg-cover bg-center border-8 border-yellow-700 rounded-2xl shadow-lg p-6 text-center text-yellow-900" 
             style="background-image: url('https://images.unsplash.com/photo-1546182990-dffeafbe841d?w=600');">
            
            <!-- Cabecera decorativa -->
            <div class="w-full h-8 bg-yellow-700 rounded-t-2xl"></div>

            <!-- Contenido -->
            <div class="py-6">
                <h1 class="text-3xl font-bold">🎉 ¡Estás Invitado! 🎉</h1>
                <p class="text-lg mt-4">Te esperamos en nuestro gran día.</p>
                <p class="text-md mt-3">📅 12 de Octubre de 2025</p>
                <p class="text-sm mt-3">💌 Confirma tu asistencia.</p>
            </div>

            <!-- Pie decorativo -->
            <div class="w-full h-8 bg-yellow-700 rounded-b-2xl"></div>
        </div>

    </div>

</body>
</html>

