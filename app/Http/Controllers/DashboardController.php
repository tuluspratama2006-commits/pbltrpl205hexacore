<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Portofolio;
use App\Models\Testimoni;
use App\Models\ProfilPerusahaan;
use App\Models\VisitorLog;
use App\Models\AdminActivity;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        // Pakai data DB agar dashboard benar-benar terhubung
        $stats = [
            // total pengunjung dihitung dari visitor_id cookie 9 (statistika dan pbo)
            'pengunjung' => VisitorLog::query()
                ->where('path', '!=', '')
                ->distinct('visitor_id')
                ->count('visitor_id'),
            'proyek' => Portofolio::count(),
            'berita' => Berita::count(),
            'testimoni' => Testimoni::count(),
        ];

        // Aktivitas terbaru ADMIN
        $aktivitas = AdminActivity::query()
            ->latest('created_at')
            ->limit(6)
            ->get()
            ->map(function ($row) {
                return [
                    'user' => $row->admin_name ?? 'Admin',
                    'aksi' => $row->aksi ?? '',
                    'target' => $row->target ?? '',
                ];
            })
            ->all();

        // Grafik pengunjung per bulan (12 bulan terakhir) - distinct visitor_id
        $grafik = [];
        $start = now()->subMonths(11)->startOfMonth();
        for ($i = 0; $i < 12; $i++) {
            $dt = $start->copy()->addMonths($i);
            $count = VisitorLog::query()
                ->whereYear('created_at', $dt->year)
                ->whereMonth('created_at', $dt->month)
                ->distinct('visitor_id')
                ->count('visitor_id');

            $grafik[] = [
                'bulan' => $dt->format('M'),
                'nilai' => $count,
            ];
        }


        $profil = ProfilPerusahaan::first();

        return view('admin.dashboard', compact('stats', 'aktivitas', 'grafik', 'profil'));
    }
}

