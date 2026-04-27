<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if(Auth::check()) return $this->redirectByRole();
        return view('auth.login');
    }

        public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;

            // REDIRECT LANGSUNG PAKE IF ELSE BIASA (BYPASS FUNCTION)
            if ($role == 'staff') {
                return redirect('/staff/dashboard');
            } elseif ($role == 'kades') {
                return redirect('/kades/dashboard');
            } elseif ($role == 'warga') {
                return redirect('/warga/dashboard');
            } else {
                return redirect('/');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function showRegister()
    {
        if(Auth::check()) return $this->redirectByRole();
        return view('auth.register');
    }

        public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|digits:16|unique:users',
            'agama' => 'required', // PASTIKAN ADA
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        \App\Models\User::create([
            'nik' => $request->nik,       // PASTIKAN ADA
            'agama' => $request->agama,   // PASTIKAN ADA
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'warga',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

        private function redirectByRole()
    {
        // Debug sementara: Hapus baris dibawah ini setelah tau salahnya dimana
        // dd('Role kamu adalah: ' . Auth::user()->role); 

        $role = Auth::user()->role;

        if($role == 'warga') {
            return redirect()->route('warga.dashboard');
        }
        
        if($role == 'staff') {
            return redirect()->route('staff.dashboard');
        }
        
        if($role == 'kades') {
            return redirect()->route('kades.dashboard');
        }

        // Jika role tidak dikenali (misal: kosong), lempar ke logout dengan pesan error
        Auth::logout();
        return redirect()->route('login')->withErrors(['email' => 'Akun Anda tidak memiliki hak akses (Role tidak dikenali).']);
    }
}
