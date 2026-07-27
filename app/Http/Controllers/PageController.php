<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Landing Page
     */
    public function landing()
    {
        return view('landing');
    }

    /**
     * Halaman Tentang
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Halaman Kontak
     */
    public function contact()
    {
        return view('pages.contact');
    }
}