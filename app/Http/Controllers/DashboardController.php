<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data bencana untuk peta
        $bencana = Bencana::all();

        // Kirim ke view
        return view('dashboard.dashboard', compact('bencana'));
    }
}
