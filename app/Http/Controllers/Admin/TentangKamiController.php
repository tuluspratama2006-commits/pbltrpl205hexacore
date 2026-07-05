<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    public function index()
    {
        $profil = ProfilPerusahaan::first();

        return view('admin.tentang-kami', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_perusahaan'    => 'nullable|string|max:150',
            'deskripsi'          => 'nullable|string',
            'visi'               => 'nullable|string',
            'misi'               => 'nullable|string',
            'nomor_sertifikasi'  => 'nullable|string|max:255',
            'tentang_hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'foto_baru.*'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $profil = ProfilPerusahaan::firstOrNew(['id_profil' => 1]);

        $data = $request->only([
            'nama_perusahaan', 'deskripsi',
            'visi', 'misi', 'nomor_sertifikasi',
        ]);

        // Upload tentang hero image (watermark di halaman tentang kami)
        if ($request->hasFile('tentang_hero_image')) {
            if ($profil->tentang_hero_image) {
                Storage::disk('public')->delete($profil->tentang_hero_image);
            }
            $data['tentang_hero_image'] = $request->file('tentang_hero_image')->store('tentang', 'public');
        }

        // Ambil foto grid yang ada
        $fotoGrid = json_decode($profil->foto_grid ?? '[]', true);

        // Hapus foto tertentu jika ada request hapus
        if ($request->has('hapus_foto')) {
            $idx = (int) $request->input('hapus_foto');

            if (isset($fotoGrid[$idx])) {
                Storage::disk('public')->delete($fotoGrid[$idx]);
                array_splice($fotoGrid, $idx, 1);
            }

            $data['foto_grid'] = json_encode(array_values($fotoGrid));
            $profil->fill($data);
            $profil->save();

            NotificationController::logActivity(
                session('admin_username') ?? 'Admin',
                'Hapus',
                'Tentang Kami (foto #'.$idx.')'
            );

            return redirect()->route('admin.tentang')->with('success', 'Foto berhasil dihapus.');
        }

        // Upload foto baru (LIFO — terbaru di depan)
        if ($request->hasFile('foto_baru')) {
            $fotoBaru = [];
            foreach ($request->file('foto_baru') as $file) {
                $fotoBaru[] = $file->store('tentang', 'public');
            }
            // Foto baru di depan, foto lama di belakang, max 5
            $fotoGrid = array_slice(array_merge($fotoBaru, $fotoGrid), 0, 5);
        }

        $data['foto_grid'] = json_encode(array_values($fotoGrid));

        $profil->fill($data);
        $profil->save();

        NotificationController::logActivity(
            session('admin_username') ?? 'Admin',
            'Edit',
            'Tentang Kami'
        );

        return redirect()->route('admin.tentang')->with('success', 'Tentang Kami berhasil diperbarui.');
    }
}