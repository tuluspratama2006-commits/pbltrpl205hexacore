<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        $profil = ProfilPerusahaan::first();
        $user = DB::table('admin')->first();

        return view('admin.pengaturan', compact('profil', 'user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'nullable|string|max:150',
            'tagline' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'email' => 'nullable|email|max:100',

            'telepon' => 'nullable|string|max:30',
            'telepon_2' => 'nullable|string|max:30',
            'alamat' => 'nullable|string',
            'alamat_2' => 'nullable|string',
            'whatsapp' => 'nullable|string|max:30',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'maps_embed' => 'nullable|string',
            'maps_embed_2' => 'nullable|string',
        ]);


        // Update profil perusahaan
        $data = $request->only([
            'nama_perusahaan', 'tagline', 'deskripsi',
            'email', 'telepon', 'telepon_2',
            'alamat', 'alamat_2', 'whatsapp', 'instagram',
            'facebook', 'linkedin', 'maps_embed', 'maps_embed_2',
        ]);

        // Landing Page hero (khusus dashboard)
        if ($request->hasFile('dashboard_hero_image')) {
            $profil = ProfilPerusahaan::first();
            if ($profil && $profil->dashboard_hero_image) {
                Storage::disk('public')->delete($profil->dashboard_hero_image);
            }
            $data['dashboard_hero_image'] = $request->file('dashboard_hero_image')->store('dashboard-hero', 'public');
        }

        // NOTE:
        // Upload hero untuk Tentang Kami ditangani oleh TentangKamiController dan disimpan ke `tentang_hero_image`.
        // Jadi form di PengaturanController hanya menangani dashboard_hero_image untuk menghindari bentrok.

        ProfilPerusahaan::updateOrCreate(['id_profil' => 1], $data);

        // Update akun admin
        $user = DB::table('admin')->first();
        $updateData = [
            'nama_admin' => $request->akun_nama ?? $user->nama_admin,
            'email' => $request->akun_email ?? $user->email,
            'updated_at' => now(),
        ];

        // Upload foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama kalau ada
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $updateData['foto'] = $request->file('foto')->store('admin', 'public');
        }

        if ($request->filled('password_baru')) {
            $request->validate([
                'password_baru' => 'min:6',
                'konfirmasi_password' => 'same:password_baru',
            ]);
            $updateData['password'] = Hash::make($request->password_baru);
        }

        DB::table('admin')->where('id_admin', $user->id_admin)->update($updateData);

        \App\Models\AdminActivity::create([
            'admin_id' => session('admin_id') ?? DB::table('admin')->where('nama_admin', session('admin_username'))->value('id_admin'),
            'admin_name' => session('admin_username') ?? 'Admin',

            'aksi' => 'Edit',
            'target' => 'Pengaturan',
            'is_read' => false,
        ]);



        return redirect()->back()->with('success', 'Landing page berhasil diperbarui!');

    }
}
