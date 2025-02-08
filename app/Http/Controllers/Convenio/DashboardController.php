<?php

namespace App\Http\Controllers\Convenio;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;

class DashboardController extends Controller
{
    public function index()
    {
        return view('convenio.dashboard');
    }
}