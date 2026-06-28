<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use App\Models\Berita;
use App\Models\Portofolio;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total pengunjung - dari tabel visitor_logs
        $totalPengunjung = DB::table('visitor_logs')->count();

        // Total dari database lainnya
        $totalProjek = Portofolio::count();
        $totalBerita = Berita::count();
        $totalTestimoni = Testimoni::count();

        // Ambil data profil perusahaan
        $profil = \App\Models\ProfilPerusahaan::first();

        // Pastikan hero image untuk dashboard membaca kolom yang benar
        if ($profil && empty($profil->hero_image) && !empty($profil->dashboard_hero_image)) {
            $profil->hero_image = $profil->dashboard_hero_image;
        }


        // Data grafik pengunjung - 12 bulan terakhir dari visitor_logs
        $labels = [];
        $grafikData = [];

        for ($i = 11; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i);
            $labels[] = $bulan->format('M');

            $jumlah = DB::table('visitor_logs')
                       ->whereYear('created_at', $bulan->year)
                       ->whereMonth('created_at', $bulan->month)
                       ->count();

            $grafikData[] = $jumlah;
        }

        // Aktivitas terbaru - dari tabel admin_activities
        $aktivitasTerbaru = DB::table('admin_activities')
                             ->orderBy('created_at', 'desc')
                             ->limit(5)
                             ->get();

        return view('admin.dashboard', compact(
            'totalPengunjung',
            'totalProjek',
            'totalBerita',
            'totalTestimoni',
            'profil',
            'labels',
            'grafikData',
            'aktivitasTerbaru'
        ));
    }
}
