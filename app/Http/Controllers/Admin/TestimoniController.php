<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonis = Testimoni::orderBy('created_at', 'desc')->get();
        
        $totalUlasan = $testimonis->where('status', 'publish')->count();
        $rataRating = $testimonis->where('status', 'publish')->avg('rating') ?? 0;
        
        return view('admin.testimoni.index', compact('testimonis', 'totalUlasan', 'rataRating'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_client' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'nama_perusahaan' => 'nullable|string|max:255',
            'foto_client' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'isi_testimoni' => 'required|string',
            'status' => 'required|in:publish,draft',
        ]);

        if ($request->hasFile('foto_client')) {
            $validated['foto_client'] = $request->file('foto_client')->store('testimonis', 'public');
        }

        $validated['created_at'] = now();
        
        Testimoni::create($validated);

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $validated = $request->validate([
            'nama_client' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'nama_perusahaan' => 'nullable|string|max:255',
            'foto_client' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'isi_testimoni' => 'required|string',
            'status' => 'required|in:publish,draft',
        ]);

        if ($request->hasFile('foto_client')) {
            if ($testimoni->foto_client) {
                Storage::disk('public')->delete($testimoni->foto_client);
            }
            $validated['foto_client'] = $request->file('foto_client')->store('testimonis', 'public');
        }

        $testimoni->update($validated);

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if ($testimoni->foto_client) {
            Storage::disk('public')->delete($testimoni->foto_client);
        }

        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil dihapus');
    }

    /**
     * Get testimoni by ID for edit
     */
    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return response()->json($testimoni);
    }
}