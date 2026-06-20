<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalProyek = Portofolio::count();
        $totalPublished = Portofolio::where('status', 'publish')->count();
        $totalUnpublished = Portofolio::where('status', 'draft')->count();

        $portofolios = Portofolio::latest()->get();

        return view('admin.portofolio', compact(
            'totalProyek',
            'totalPublished',
            'totalUnpublished',
            'portofolios'
        ));
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'judul_proyek'   => 'required|string|max:255',
            'deskripsi'      => 'required',
            'lokasi'         => 'required|string|max:255',
            'tanggal_proyek' => 'required|date',
            'nama_klien'     => 'required|string|max:255',
            'thumbnail'      => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
            'file_pdf'       => 'nullable|mimes:pdf|max:10000', // Maks 10MB
            'status'         => 'required|in:publish,draft',
        ]);

        // Inisialisasi data untuk disimpan
        $data = $request->validated();

        // Generate Slug otomatis dari judul proyek
        $data['slug'] = Str::slug($request->judul_proyek);

        // Handle upload file Gambar (Thumbnail)
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('portofolio/thumbnails', 'public');
        }

        // Handle upload file PDF (jika ada)
        if ($request->hasFile('file_pdf')) {
            $data['file_pdf'] = $request->file('file_pdf')->store('portofolio/pdfs', 'public');
        }

        // Simpan ke database
        Portofolio::create($data);

        return redirect()->route('admin.portofolio')->with('success', 'Proyek portofolio berhasil ditambahkan!');
    }

    public function update(Request $request, string $id_portofolio)
    {
        // Cari data portofolio berdasarkan primary key Anda
        $portofolio = Portofolio::where('id_portofolio', $id_portofolio)->firstOrFail();

        // Validasi input data
        $request->validate([
            'judul_proyek'   => 'required|string|max:255',
            'deskripsi'      => 'required',
            'lokasi'         => 'required|string|max:255',
            'tanggal_proyek' => 'required|date',
            'nama_klien'     => 'required|string|max:255',
            'thumbnail'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file_pdf'       => 'nullable|mimes:pdf|max:10000',
            'status'         => 'required|in:publish,draft',
        ]);

        $data = $request->validated();
        $data['slug'] = Str::slug($request->judul_proyek);

        // Jika mengupload thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus berkas thumbnail yang lama dari storage
            if ($portofolio->thumbnail) {
                Storage::disk('public')->delete($portofolio->thumbnail);
            }
            // Simpan yang baru
            $data['thumbnail'] = $request->file('thumbnail')->store('portofolio/thumbnails', 'public');
        }

        // Jika mengupload berkas PDF baru
        if ($request->hasFile('file_pdf')) {
            // Hapus berkas PDF lama jika ada
            if ($portofolio->file_pdf) {
                Storage::disk('public')->delete($portofolio->file_pdf);
            }
            // Simpan yang baru
            $data['file_pdf'] = $request->file('file_pdf')->store('portofolio/pdfs', 'public');
        }

        // Eksekusi update data di database
        $portofolio->update($data);

        return redirect()->route('admin.portofolio')->with('success', 'Proyek portofolio berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_portofolio)
    {
        $portofolio = Portofolio::where('id_portofolio', $id_portofolio)->firstOrFail();

        // Hapus file gambar thumbnail dari folder storage
        if ($portofolio->thumbnail) {
            Storage::disk('public')->delete($portofolio->thumbnail);
        }

        // Hapus file PDF dari folder storage
        if ($portofolio->file_pdf) {
            Storage::disk('public')->delete($portofolio->file_pdf);
        }

        // Hapus baris data dari database
        $portofolio->delete();

        return redirect()->route('admin.portofolio')->with('success','Proyek portofolio berhasil dihapus!');
    }
}
