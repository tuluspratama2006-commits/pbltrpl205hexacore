<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Portofolio;
use App\Models\ProfilPerusahaan;
use App\Models\Testimoni;

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

        $testimonis = Testimoni::where('status', 'publish')
            ->latest()
            ->limit(6)
            ->get();

        return view('home', compact('layanans', 'profil', 'publishedBerita', 'semuaPortofolio', 'testimonis'));
    }

    public function create()
    {
        return view('home');
    }
}
