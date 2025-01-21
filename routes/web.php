<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\RolesPermissionsManager;


Route::view('/', 'welcome');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/roles-permissions', RolesPermissionsManager::class)
    ->middleware('role:admin|super-admin') // Solo permitir acceso a admin y super-admin
    ->name('roles-permissions');









Route::get('/register', Register::class)->name('register')->middleware('guest');



require __DIR__ . '/auth.php';
