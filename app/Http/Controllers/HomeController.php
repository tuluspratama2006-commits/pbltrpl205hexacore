<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Layanan;
use App\Models\ProfilPerusahaan;

class HomeController extends Controller
{
    public function index()
    {
        $layanans = Layanan::where('status', 'publish')
            ->orderBy('urutan')
            ->get();

        $profil = ProfilPerusahaan::first();

        $publishedBerita = Berita::where('status', 'publish')
            ->latest('tanggal_posting')
            ->get();

        return view('home', compact('layanans', 'profil', 'publishedBerita'));
    }

    public function create()
    {
        return view('home');
    }
}
