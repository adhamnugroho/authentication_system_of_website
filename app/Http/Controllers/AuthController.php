<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $judulLogin = 'Login';
    protected $judulRegistrasi = 'Registrasi';
    protected $directory = 'auth';

    public function login()
    {

        return view($this->directory . ".login", [
            'judul' => $this->judulLogin,
        ]);
    }

    public function postLogin(Request $request)
    {
        // return $request->all();

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $credentials['username'];

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('adminDashboard')
                ->with('status', 'success')
                ->with('message', 'Selamat Datang ' . $username . '!');
        }

        return back()
            ->with('status', 'error')
            ->with('message', 'Username atau Password Salah!');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('status', 'success')
            ->with('message', 'Anda Berhasil Logout');
    }
}
