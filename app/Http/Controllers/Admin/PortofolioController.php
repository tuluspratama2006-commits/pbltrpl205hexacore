<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPortofolio = Portofolio::count();
        $Portofoliopublished = Portofolio::where('status', 'publish')->count();
        $Portofoliounpublished = Portofolio::where('status', 'draft')->count();

        $semuaPortofolio = Portofolio::latest()->get();

        return view('admin.portofolio', compact(
            'totalPortofolio',
            'Portofoliopublished',
            'Portofoliounpublished',
            'semuaPortofolio'
        ));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_proyek' => 'required|string|max:255',
            'deskripsi' => 'required',
            'lokasi' => 'required|string|max:255',
            'tanggal_proyek' => 'required|date',
            'nama_klien' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'file_pdf' => 'nullable|mimes:pdf|max:10000',
            'status' => 'required|in:publish,draft',
        ]);

        $validatedData['slug'] = $this->buatSlugUnik(Str::slug($request->judul_proyek));
        $validatedData['deskripsi'] = preg_replace(['/&nbsp;(?=\s*<)/', '/(?:\s*<(\w+)>\s*<\/\1>\s*)+$/u'], ['', ''], $validatedData['deskripsi']);

        try {
            if ($request->hasFile('thumbnail')) {
                $validatedData['thumbnail'] = $request->file('thumbnail')->store('portofolio/thumbnails', 'public');
            }

            if ($request->hasFile('file_pdf')) {
                $validatedData['file_pdf'] = $request->file('file_pdf')->store('portofolio/pdfs', 'public');
            }

            $judul = $validatedData['judul_proyek'] ?? '';

            Portofolio::create($validatedData);

            \App\Models\AdminActivity::create([
                'admin_name' => session('admin_username') ?? 'Admin',
                'aksi' => 'Tambah',
                'target' => $judul,
            ]);

            return redirect()->route('admin.portofolio')->with('success', 'Proyek portofolio berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->route('admin.portofolio')->with('error', 'Gagal menyimpan: '.$e->getMessage())->withInput();
        }
    }

    public function update(Request $request, string $id_portofolio)
    {
        $portofolio = Portofolio::where('id_portofolio', $id_portofolio)->firstOrFail();

        $validatedData = $request->validate([
            'judul_proyek' => 'required|string|max:255',
            'deskripsi' => 'required',
            'lokasi' => 'required|string|max:255',
            'tanggal_proyek' => 'required|date',
            'nama_klien' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file_pdf' => 'nullable|mimes:pdf|max:10000',
            'status' => 'required|in:publish,draft',
        ]);

        $slug = Str::slug($request->judul_proyek);
        if ($slug !== $portofolio->slug) {
            $validatedData['slug'] = $this->buatSlugUnik($slug, $id_portofolio);
        }
        $validatedData['deskripsi'] = preg_replace(['/&nbsp;(?=\s*<)/', '/(?:\s*<(\w+)>\s*<\/\1>\s*)+$/u'], ['', ''], $validatedData['deskripsi']);

        try {
            if ($request->hasFile('thumbnail')) {
                if ($portofolio->thumbnail && Storage::disk('public')->exists($portofolio->thumbnail)) {
                    Storage::disk('public')->delete($portofolio->thumbnail);
                }
                $validatedData['thumbnail'] = $request->file('thumbnail')->store('portofolio/thumbnails', 'public');
            }

            if ($request->hasFile('file_pdf')) {
                if ($portofolio->file_pdf && Storage::disk('public')->exists($portofolio->file_pdf)) {
                    Storage::disk('public')->delete($portofolio->file_pdf);
                }
                $validatedData['file_pdf'] = $request->file('file_pdf')->store('portofolio/pdfs', 'public');
            }

            $judulBaru = $validatedData['judul_proyek'] ?? $portofolio->judul_proyek;

            $portofolio->update($validatedData);

            \App\Models\AdminActivity::create([
                'admin_name' => session('admin_username') ?? 'Admin',
                'aksi' => 'Edit',
                'target' => $judulBaru,
            ]);

            return redirect()->route('admin.portofolio')->with('success', 'Proyek portofolio berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->route('admin.portofolio')->with('error', 'Gagal mengupdate: '.$e->getMessage())->withInput();
        }
    }

    private function buatSlugUnik(string $slug, ?string $ignoreId = null): string
    {
        $original = $slug;
        $counter = 1;

        while (true) {
            $query = Portofolio::where('slug', $slug);
            if ($ignoreId) {
                $query->where('id_portofolio', '!=', $ignoreId);
            }
            if (! $query->exists()) {
                return $slug;
            }
            $slug = $original.'-'.$counter++;
        }
    }

    public function destroy(string $id_portofolio)
    {
        $portofolio = Portofolio::where('id_portofolio', $id_portofolio)->firstOrFail();

        // Hapus file gambar thumbnail dari folder storage jika ada berkasnya
        if ($portofolio->thumbnail && Storage::disk('public')->exists($portofolio->thumbnail)) {
            Storage::disk('public')->delete($portofolio->thumbnail);
        }

        // Hapus file PDF dari folder storage jika ada berkasnya
        if ($portofolio->file_pdf && Storage::disk('public')->exists($portofolio->file_pdf)) {
            Storage::disk('public')->delete($portofolio->file_pdf);
        }

        $judul = $portofolio->judul_proyek;

        // Hapus baris data dari database
        $portofolio->delete();

        \App\Models\AdminActivity::create([
            'admin_name' => session('admin_username') ?? 'Admin',
            'aksi' => 'Hapus',
            'target' => $judul,
        ]);

        return redirect()->route('admin.portofolio')->with('success', 'Proyek portofolio berhasil dihapus!');

    }
}
