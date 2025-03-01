<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;

class DashboardController extends Controller
{
    public function index($view = 'crear-evento')
    {
        return view('web.dashboard', compact('view'));
    }
}