<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $semuaBerita = Berita::latest('tanggal_posting')->get();

        $totalPost = Berita::count();
        $published = Berita::where('status', 'publish')->count();
        $unpublished = Berita::where('status', 'draft')->count();

        if ($request->routeIs('admin.dashboard')) {
            return view('admin.dashboard', compact(
                'semuaBerita',
                'totalPost',
                'published',
                'unpublished'
            ));
        }

        return view('admin.berita', compact(
            'semuaBerita',
            'totalPost',
            'published',
            'unpublished'
        ));
    }

    public function store(Request $request)
    {
        // Validasi Kelayakan Data Inputan Form Modal
        $request->validate([
            'judul_berita' => 'required|max:200',
            'tanggal_posting' => 'required|date',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,publish',
            'isi_berita' => 'required',
        ]);

        // Upload file gambar ke dalam folder: storage/app/public/thumbnails
        $pathFoto = $request->file('thumbnail')->store('thumbnails', 'public');

        // Eksekusi simpan data ke database phpMyAdmin
        $judul = $request->judul_berita;

        Berita::create([
            'judul_berita' => $judul,
            'slug' => Str::slug($judul),
            'isi_berita' => preg_replace(['/&nbsp;(?=\s*<)/', '/(?:\s*<(\w+)>\s*<\/\1>\s*)+$/u'], ['', ''], $request->isi_berita),
            'thumbnail' => $pathFoto,
            'tanggal_posting' => $request->tanggal_posting,
            'status' => $request->status,
            'id_admin' => Auth::id(),
        ]);

        \App\Models\AdminActivity::create([
            'admin_name' => Session('admin_username') ?? 'Admin',
            'aksi' => 'Tambah',
            'target' => $judul,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita baru berhasil diterbitkan!');

    }

    public function update(Request $request, string $id_berita)
    {
        // 1. Cari data berita berdasarkan Primary Key 'id_berita'
        $berita = Berita::findOrFail($id_berita);

        // 2. Validasi data (Thumbnail dibuat nullable agar foto tidak wajib diganti)
        $request->validate([
            'judul_berita' => 'required|max:200',
            'tanggal_posting' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,publish',
            'isi_berita' => 'required',
        ]);

        $pathFoto = $berita->thumbnail; // Set standar menggunakan alamat foto lama

        // 3. Jika admin mengunggah file foto baru
        if ($request->hasFile('thumbnail')) {
            // Hapus file foto lama di folder storage agar kapasitas server hemat
            if ($berita->thumbnail) {
                Storage::disk('public')->delete($berita->thumbnail);
            }
            // Simpan file foto yang baru
            $pathFoto = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // 4. Update data ke database
        $judulBaru = $request->judul_berita;

        $berita->update([
            'judul_berita' => $judulBaru,
            'slug' => Str::slug($judulBaru),
            'isi_berita' => preg_replace(['/&nbsp;(?=\s*<)/', '/(?:\s*<(\w+)>\s*<\/\1>\s*)+$/u'], ['', ''], $request->isi_berita),
            'thumbnail' => $pathFoto,
            'tanggal_posting' => $request->tanggal_posting,
            'status' => $request->status,
        ]);

        \App\Models\AdminActivity::create([
            'admin_name' => Session('admin_username') ?? 'Admin',
            'aksi' => 'Edit',
            'target' => $judulBaru,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Data berita berhasil diperbarui!');

    }

    /**
     * Menghapus Berita Beserta Berkas Fisik Fotonya
     */
    public function destroy(string $id_berita)
    {
        $berita = Berita::findOrFail($id_berita);

        // 1. Hapus berkas file foto dari folder penyimpanan storage luar
        if ($berita->thumbnail) {
            Storage::disk('public')->delete($berita->thumbnail);
        }

        $judul = $berita->judul_berita;

        // 2. Hapus baris data dari tabel phpMyAdmin
        $berita->delete();

        \App\Models\AdminActivity::create([
            'admin_name' => Session('admin_username') ?? 'Admin',
            'aksi' => 'Hapus',
            'target' => $judul,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus permanen!');

    }
}
