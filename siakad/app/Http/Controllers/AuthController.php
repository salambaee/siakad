<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard('mahasiswa')->check()) return redirect()->route('mahasiswa.dashboard');
        if (Auth::guard('dosen')->check()) return redirect()->route('dosen.dashboard');
        if (Auth::guard('admin')->check()) return redirect()->route('admin.dashboard');

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = ['password' => $request->password];

        if (Auth::guard('dosen')->attempt(['nidn' => $request->username, 'password' => $request->password])) {
            return redirect()->intended(route('dosen.dashboard'));
        }

        if (Auth::guard('mahasiswa')->attempt(['nim' => $request->username, 'password' => $request->password])) {
            return redirect()->intended(route('mahasiswa.dashboard'));
        }

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors(['username' => 'Username atau password salah.'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('dosen')->check()) Auth::guard('dosen')->logout();
        elseif (Auth::guard('mahasiswa')->check()) Auth::guard('mahasiswa')->logout();
        elseif (Auth::guard('admin')->check()) Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout');
    }
}