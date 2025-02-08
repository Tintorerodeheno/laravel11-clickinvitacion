<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;





class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    // Obtener el usuario autenticado
    $user = auth()->user();

    // Definir rutas según el rol del usuario
    if ($user->hasRole('super-admin')) {
        return redirect()->route('super-admin.dashboard');
    } elseif ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->hasRole('vendedor')) {
        return redirect()->route('vendedor.dashboard');
    } elseif ($user->hasRole('convenio')) {
        return redirect()->route('convenio.dashboard');
    } elseif ($user->hasRole('cliente')) {
        return redirect()->route('cliente.dashboard');
    }

    // Si no tiene un rol específico, lo enviamos a una página por defecto
    return redirect()->route('dashboard');
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
