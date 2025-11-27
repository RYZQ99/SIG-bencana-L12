<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Kirim ke view dashboard
        return view('dashboard.dashboard');
    }
}
