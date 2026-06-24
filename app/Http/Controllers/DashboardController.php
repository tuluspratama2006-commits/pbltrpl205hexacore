<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pengunjung' => 5,
            'proyek' => 5,
            'berita' => 5,
            'testimoni' => 5,
        ];

        $aktivitas = [
            ['user' => 'admin nura', 'aksi' => 'login', 'target' => ''],
            ['user' => 'nura', 'aksi' => 'mengupdate', 'target' => 'berita skypool'],
            ['user' => 'nura', 'aksi' => 'mempublish', 'target' => 'layanan konstruksi jalan'],
            ['user' => 'nura', 'aksi' => 'mengupdate', 'target' => 'testimoni'],
            ['user' => 'nura', 'aksi' => 'mengupdate', 'target' => 'background landing page'],
        ];

        $grafik = [
            ['bulan' => 'Jan', 'nilai' => 30],
            ['bulan' => 'Feb', 'nilai' => 55],
            ['bulan' => 'Mar', 'nilai' => 40],
            ['bulan' => 'Apr', 'nilai' => 80],
        ];

        return view('admin.dashboard', compact('stats', 'aktivitas', 'grafik'));
    }
}
