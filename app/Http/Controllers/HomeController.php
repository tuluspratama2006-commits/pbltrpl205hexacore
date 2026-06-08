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

    $profil = \App\Models\ProfilPerusahaan::first();

    return view('home', compact('layanans', 'profil'));
}
    public function create()
    {
        return view('home');
    }
}