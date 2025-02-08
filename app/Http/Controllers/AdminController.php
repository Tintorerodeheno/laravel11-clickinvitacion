<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Muestra el dashboard de administración.
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
