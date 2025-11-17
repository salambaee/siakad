<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard('mahasiswa')->check()) {
            return redirect('/mahasiswa');
        }
        if (Auth::guard('dosen')->check()) {
            return redirect('/dosen');
        }
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        if (is_numeric($username) && strlen($username) == 10) {
            $dosen = Dosen::where('nidn', $username)->first();
            
            if ($dosen && Hash::check($password, $dosen->password)) {
                Auth::guard('dosen')->login($dosen);
                return redirect()->intended('/dosen');
            }
        }

        if (is_numeric($username) && strlen($username) == 12) {
            $mahasiswa = Mahasiswa::where('nim', $username)->first();

            if ($mahasiswa && $password == $username) {
                Auth::guard('mahasiswa')->login($mahasiswa);
                return redirect()->intended('/mahasiswa');
            }
        }

        if (!is_numeric($username)) {
            $admin = Admin::where('username', $username)->first();
            
            if ($admin && Hash::check($password, $admin->password)) {
                Auth::guard('admin')->login($admin);
                return redirect()->intended('/admin');
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('dosen')->check()) {
            Auth::guard('dosen')->logout();
        } elseif (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout');
    }
}