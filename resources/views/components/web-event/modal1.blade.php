<div x-show="activeModal === 'modal1'" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
    <div class="bg-white w-80 p-4 rounded shadow-lg">
        <h2 class="text-lg font-semibold">Modal 1</h2>
        <p>Efectivamente si vengo de aqui.</p>

        <div class="flex justify-between mt-4">
            <button @click="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Cerrar</button>
            <button @click="openModal('modal2')" class="bg-green-500 text-white px-4 py-2 rounded">Siguiente</button>
        </div>
    </div>
</div>
