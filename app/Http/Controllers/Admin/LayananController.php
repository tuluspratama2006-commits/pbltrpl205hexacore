<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $layanans      = Layanan::orderBy('urutan')->get();
        $totalLayanan  = $layanans->count();
        $layananAktif  = $layanans->where('status', 'publish')->count();
        $bestSeller    = 0; // sesuaikan jika ada kolom best_seller nantinya

        return view('admin.layanan', compact(
            'layanans',
            'totalLayanan',
            'layananAktif',
            'bestSeller'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_layanan' => 'required|string|max:255',
            'deskripsi'     => 'required|string',
            'icon'          => 'nullable|string|max:100',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan'        => 'nullable|integer',
            'status'        => 'required|in:publish,draft',
        ]);

        $data = [
            'judul_layanan' => $request->judul_layanan,
            'slug'          => Str::slug($request->judul_layanan),
            'deskripsi'     => $request->deskripsi,
            'icon'          => $request->icon,
            'urutan'        => $request->urutan ?? 0,
            'status'        => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        Layanan::create($data);

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'judul_layanan' => 'required|string|max:255',
            'deskripsi'     => 'required|string',
            'icon'          => 'nullable|string|max:100',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan'        => 'nullable|integer',
            'status'        => 'required|in:publish,draft',
        ]);

        $data = [
            'judul_layanan' => $request->judul_layanan,
            'slug'          => Str::slug($request->judul_layanan),
            'deskripsi'     => $request->deskripsi,
            'icon'          => $request->icon,
            'urutan'        => $request->urutan ?? $layanan->urutan,
            'status'        => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($layanan->gambar) {
                Storage::disk('public')->delete($layanan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        $layanan->update($data);

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
        }

        $layanan->delete();

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil dihapus.');
    }
}