<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminActivity;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::orderBy('urutan')->get();
        $totalLayanan = $layanans->count();
        $layananAktif = $layanans->where('status', 'publish')->count();
        $layananNonAktif = $layanans->where('status', 'draft')->count();

        return view('admin.layanan', compact(
            'layanans',
            'totalLayanan',
            'layananAktif',
            'layananNonAktif'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'icon' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan' => 'nullable|integer',
            'status' => 'required|in:publish,draft',
        ]);

        $data = [
            'judul_layanan' => $request->judul_layanan,
            'slug' => Str::slug($request->judul_layanan),
            'deskripsi' => preg_replace(['/&nbsp;(?=\s*<)/', '/(?:\s*<(\w+)>\s*<\/\1>\s*)+$/u'], ['', ''], $request->deskripsi),
            'icon' => $request->icon,
            'urutan' => $request->urutan ?? 0,
            'status' => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        $judul = $request->judul_layanan;

        Layanan::create($data);

        AdminActivity::create([
            'admin_name' => session('admin_username') ?? 'Admin',
            'aksi' => 'Tambah',
            'target' => $judul,
        ]);

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil ditambahkan.');

    }

    public function update(Request $request, int $id)
    {
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'judul_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'icon' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan' => 'nullable|integer',
            'status' => 'required|in:publish,draft',
        ]);

        $data = [
            'judul_layanan' => $request->judul_layanan,
            'slug' => Str::slug($request->judul_layanan),
            'deskripsi' => preg_replace(['/&nbsp;(?=\s*<)/', '/(?:\s*<(\w+)>\s*<\/\1>\s*)+$/u'], ['', ''], $request->deskripsi),
            'icon' => $request->icon,
            'urutan' => $request->urutan ?? $layanan->urutan,
            'status' => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($layanan->gambar) {
                Storage::disk('public')->delete($layanan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        $judulBaru = $request->judul_layanan;

        $layanan->update($data);

        AdminActivity::create([
            'admin_name' => session('admin_username') ?? 'Admin',
            'aksi' => 'Edit',
            'target' => $judulBaru,
        ]);

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil diperbarui.');

    }

    public function destroy(int $id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
        }

        $judul = $layanan->judul_layanan;

        $layanan->delete();

        AdminActivity::create([
            'admin_name' => session('admin_username') ?? 'Admin',
            'aksi' => 'Hapus',
            'target' => $judul,
        ]);

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil dihapus.');

    }
}
