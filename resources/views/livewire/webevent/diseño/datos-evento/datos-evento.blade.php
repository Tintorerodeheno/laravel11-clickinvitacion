@if ($modalVisible)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
            <button wire:click="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-red-500">
                ✖
            </button>

            <h2 class="text-xl font-bold text-center">
                @switch($modalIndex)
                    @case(0) Información Preliminar @break
                    @case(1) Sobre la Ceremonia @break
                    @case(2) Sobre la Celebración @break
                    @case(3) Sobre el Evento @break
                    @case(4) Más sobre el Evento @break
                    @case(5) Plataformas y Social @break
                    @case(6) Sobre los Regalos @break
                @endswitch
            </h2>

            <div class="mt-6 flex justify-between">
                <button wire:click="previousModal" class="px-4 py-2 bg-gray-500 text-white rounded" @if($modalIndex === 0) disabled @endif>
                    Anterior
                </button>

                <button class="px-4 py-2 bg-blue-500 text-white rounded">
                    Actualizar Datos
                </button>

                @if($modalIndex < 6)
                    <button wire:click="nextModal" class="px-4 py-2 bg-green-500 text-white rounded">
                        Siguiente
                    </button>
                @endif
            </div>
        </div>
    </div>
@endif
