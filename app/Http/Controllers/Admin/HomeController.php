<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil testimoni yang statusnya publish
        $testimonis = Testimoni::where('status', 'publish')
            ->orderBy('created_at', 'desc')
            ->limit(6) // Tampilkan 6 testimoni terbaru
            ->get();

        return view('home', compact('testimonis'));
    }
}
