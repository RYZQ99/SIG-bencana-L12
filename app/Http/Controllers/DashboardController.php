<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\GeojsonFile; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $active = GeojsonFile::where('is_deployed', true)->first();

        $geojson = null;

        if ($active) {
            $geojson = Storage::get("geojson/{$active->filename}");
        }

        return view('dashboard.dashboard', compact('geojson', 'active'));
    }
}
