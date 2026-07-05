<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Portofolio;
use App\Models\ProfilPerusahaan;
use App\Models\Testimoni;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengunjung = DB::table('visitor_logs')->count();
        $totalLayanan    = Layanan::count();
        $totalProjek     = Portofolio::count();
        $totalBerita     = Berita::count();
        $totalTestimoni  = Testimoni::count();
        $profil          = ProfilPerusahaan::first();

        $labels = [];
        $grafikData = [];
        for ($i = 11; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i);
            $labels[] = $bulan->format('M');
            $grafikData[] = DB::table('visitor_logs')
                ->whereYear('created_at', $bulan->year)
                ->whereMonth('created_at', $bulan->month)
                ->count();
        }

        $aktivitasTerbaru = DB::table('admin_activities')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalPengunjung',
            'totalLayanan',
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