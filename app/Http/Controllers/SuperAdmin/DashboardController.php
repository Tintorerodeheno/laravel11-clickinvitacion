<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($view = 'dashboard-metrics')
    {
        return view('super-admin.dashboard', compact('view'));
    }
}
