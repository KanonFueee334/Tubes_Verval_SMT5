<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'password' => 'required',
        ]);
        $credentials = [
            'nama_pengguna' => $request->nama_pengguna,
            'password' => $request->password,
        ];

        Log::info('Login Info: ', $credentials);

        if (Auth::attempt($credentials)) {
            session()->flash('login_success', 'Anda berhasil login!');
            $user = Auth::user();
            switch ($user->role) {
                case 'superadmin':
                    return redirect()->route('super_admin.dashboard')->with('success', 'Anda berhasil login sebagai Superadmin!');
                case 'admin':
                    return redirect()->route('admin')->with('success', 'Anda berhasil login sebagai Admin!');
                case 'gudang':
                    return redirect()->route('gudang.dashboard')->with('success', 'Anda berhasil login sebagai Gudang!');
                default:
                    return abort(401); // Fallback if role is undefined
            }
        }

        return redirect()->route('login')->with('error', 'Nama pengguna atau kata sandi salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'anda telah berhasil keluar.');
    }
}
