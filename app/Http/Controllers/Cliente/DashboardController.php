<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;

class DashboardController extends Controller
{
    public function index()
    {
        return view('cliente.dashboard');
    }
}