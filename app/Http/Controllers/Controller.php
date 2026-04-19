<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class Controller extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => 'required|string',
        ]);

        // Simpan ke database jika diperlukan
        // Contact::create($validated);

        // Kirim email notifikasi (opsional)
        // Mail::to('admin@berkahalam.co.id')->send(new ContactMail($validated));

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}
