<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index()
    {
        $bencana = Bencana::all(); // Ambil semua data bencana
        
        return view('peta.index', compact('bencana'));
    }
}
