<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminController;
use App\Http\Controllers\Vendedor\DashboardController as VendedorDashboard;
use App\Http\Controllers\Convenio\DashboardController as ConvenioDashboard;
use App\Http\Controllers\Cliente\DashboardController as ClienteDashboard;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Admin\Graficas;





// Rutas de todos los roles administrativos

Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::get('/super-admin/dashboard/{view?}', [SuperAdminController::class, 'index'])
        ->name('super-admin.dashboard');

    Route::get('/super-admin/roles-permissions', function () {
        return redirect()->route('super-admin.dashboard', ['view' => 'roles-permissions']);
    })->name('super-admin.roles-permissions');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:vendedor'])->prefix('vendedor')->name('vendedor.')->group(function () {
    Route::get('/dashboard', [VendedorController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:convenio'])->prefix('convenio')->name('convenio.')->group(function () {
    Route::get('/dashboard', [ConvenioController::class, 'index'])->name('dashboard');
});









// Rutas de todos los roles de clientes


Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/cliente/dashboard/{view?}', [ClienteDashboard::class, 'index'])
        ->name('cliente.dashboard');
});














// Welcome
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Sobrescribimos la lógica de login para redirigir admins a su panel
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');



Route::middleware(['auth'])->group(function () {
    Route::get('/admin/graficas', Graficas::class)->name('admin.graficas');
});


require __DIR__.'/auth.php';













