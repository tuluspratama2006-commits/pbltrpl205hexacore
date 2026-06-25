<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Portofolio;
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

        $semuaPortofolio = Portofolio::where('status', 'publish')
            ->latest()
            ->get();

        return view('home', compact('layanans', 'profil', 'publishedBerita', 'semuaPortofolio'));
    }

    public function create()
    {
        return view('home');
    }
}
