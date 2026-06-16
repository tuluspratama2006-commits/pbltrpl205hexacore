<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Berita;

class HomeController extends Controller
{
 public function index()
{
    $layanans = Layanan::where('status', 'publish')
                       ->orderBy('urutan')
                       ->get();

    $profil = \App\Models\ProfilPerusahaan::first();

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
