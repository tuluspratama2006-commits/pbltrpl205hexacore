<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::orderBy('created_at', 'desc')->get();
        $totalUlasan = Testimoni::count();
        $rataRating = Testimoni::where('status', 'publish')->avg('rating') ?? 0;

        return view('admin.testimoni', compact('testimonis', 'totalUlasan', 'rataRating'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_client' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'nama_perusahaan' => 'nullable|string|max:255',
            'foto_client' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'isi_testimoni' => 'required|string',
            'status' => 'required|in:publish,draft',
        ]);

        try {
            if ($request->hasFile('foto_client')) {
                $validated['foto_client'] = $request->file('foto_client')->store('testimoni', 'public');
            }

            $nama = $validated['nama_client'] ?? '';

            Testimoni::create($validated);

            \App\Models\AdminActivity::create([
                'admin_name' => session('admin_username') ?? 'Admin',
                'aksi' => 'Tambah',
                'target' => $nama,
            ]);

            return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil disimpan!');

        } catch (\Exception $e) {
            return redirect()->route('admin.testimoni')->with('error', 'Gagal menyimpan: '.$e->getMessage())->withInput();
        }
    }

    public function update(Request $request, int $id)

    {
        $testimoni = Testimoni::findOrFail($id);

        $validated = $request->validate([
            'nama_client' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'nama_perusahaan' => 'nullable|string|max:255',
            'foto_client' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'isi_testimoni' => 'required|string',
            'status' => 'required|in:publish,draft',
        ]);

        try {
            if ($request->hasFile('foto_client')) {
                if ($testimoni->foto_client) {
                    Storage::disk('public')->delete($testimoni->foto_client);
                }
                $validated['foto_client'] = $request->file('foto_client')->store('testimoni', 'public');
            }

            $namaBaru = $validated['nama_client'] ?? $testimoni->nama_client;

            $testimoni->update($validated);

            \App\Models\AdminActivity::create([
                'admin_name' => session('admin_username') ?? 'Admin',
                'aksi' => 'Edit',
                'target' => $namaBaru,
            ]);

            return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil diupdate!');

        } catch (\Exception $e) {
            return redirect()->route('admin.testimoni')->with('error', 'Gagal mengupdate: '.$e->getMessage())->withInput();
        }
    }

    public function destroy(int $id)

    {
        try {
            $testimoni = Testimoni::findOrFail($id);

            if ($testimoni->foto_client) {
                Storage::disk('public')->delete($testimoni->foto_client);
            }

            $nama = $testimoni->nama_client;

            $testimoni->delete();

            \App\Models\AdminActivity::create([
                'admin_name' => session('admin_username') ?? 'Admin',
                'aksi' => 'Hapus',
                'target' => $nama,
            ]);

            return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->route('admin.testimoni')->with('error', 'Gagal menghapus: '.$e->getMessage());
        }
    }
}
