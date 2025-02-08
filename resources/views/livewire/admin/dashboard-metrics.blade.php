<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Total Ventas -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-bold">Total Ventas</h2>
        <p class="text-2xl mt-4">${{ number_format($totalSales, 2) }}</p>
    </div>

    <!-- Ventas por Vendedor -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-bold">Ventas por Vendedor</h2>
        <p class="text-2xl mt-4">${{ number_format($salesByVendors, 2) }}</p>
    </div>

    <!-- Clientes Directos -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-bold">Clientes Directos</h2>
        <p class="text-2xl mt-4">{{ $directClients }} Clientes</p>
    </div>
</div>
