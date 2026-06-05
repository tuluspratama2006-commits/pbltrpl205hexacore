<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class HomeController extends Controller
{
    public function index()
    {
        $layanans = Layanan::where('status', 'publish')
                           ->orderBy('urutan')
                           ->get();

        return view('home', compact('layanans'));
    }

    public function create()
    {
        return view('home');
    }
}