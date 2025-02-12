<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;

class DashboardController extends Controller
{
    public function index($view = 'crear-evento')
    {
        return view('cliente.dashboard', compact('view'));
    }
}