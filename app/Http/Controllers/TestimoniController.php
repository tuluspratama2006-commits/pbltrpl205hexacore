<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::orderBy('created_at', 'desc')->get();
        $totalUlasan = Testimoni::where('status', 'publish')->count();
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
            // Handle upload foto
            if ($request->hasFile('foto_client')) {
                $validated['foto_client'] = $request->file('foto_client')->store('testimoni', 'public');
            }

            $validated['created_at'] = now();

            Testimoni::create($validated);

            return redirect()->back()->with('success', 'Testimoni berhasil disimpan!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }
}