<div x-show="activeModal === 'modal2'" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
    <div class="bg-white w-80 p-4 rounded shadow-lg">
        <h2 class="text-lg font-semibold">Modal 2</h2>
        <p>Este es el segundo modal.</p>

        <div class="flex justify-between mt-4">
            <button @click="goBack()" class="bg-yellow-500 text-white px-4 py-2 rounded">Regresar</button>
            <button @click="openModal('modal3')" class="bg-green-500 text-white px-4 py-2 rounded">Siguiente</button>
        </div>
    </div>
</div>
