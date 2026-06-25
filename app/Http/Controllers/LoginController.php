<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('username'); // input dari form tetap 'username'
        $password = $request->input('password');

        // Ambil admin dari database berdasarkan email
        $admin = DB::table('admin')->where('email', $email)->first();

        if ($admin && $admin->password === $password) {
            // Password plain text — cocok langsung
            Session::put('admin_logged_in', true);
            Session::put('admin_username', $admin->nama_admin);

            \App\Models\AdminActivity::create([
                'admin_name' => $admin->nama_admin,
                'aksi' => 'Login',
                'target' => 'Admin',
            ]);

            return response()->json([
                'success' => true,
                'redirect' => route('admin.dashboard'),
            ]);

        }

        return response()->json([
            'success' => false,
            'message' => 'Email atau password salah!',
        ]);
    }

    public function logout()
    {
        // Ambil nama admin sebelum session dibersihkan (buat aktivitas logout)
        $adminName = Session::get('admin_username');

        Session::forget('admin_logged_in');
        Session::forget('admin_username');

        \App\Models\AdminActivity::create([
            'admin_name' => $adminName ?? 'Admin',
            'aksi' => 'Logout',
            'target' => 'Admin',
        ]);

        return redirect()->route('home');

    }
}
