<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;

class DashboardController extends Controller
{
    public function index($view = 'dashboard-metrics')
    {
        return view('admin.dashboard', compact('view'));
    }
}
