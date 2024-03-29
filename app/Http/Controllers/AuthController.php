<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $judulLogin = 'Login';
    protected $judulRegistrasi = 'Registrasi';
    protected $judulLupaPassword = 'Lupa Password';
    protected $directory = 'auth';

    public function login()
    {

        return view($this->directory . ".login", [
            'judul' => $this->judulLogin,
        ]);
    }

    public function postLogin(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('adminDashboard')
                ->with('status', 'success')
                ->with('message', 'Selamat Datang ' . $request->username . '!');
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

    public function register()
    {

        return view($this->directory . ".register", [
            'judul' => $this->judulRegistrasi,
        ]);
    }

    public function registerStore(Request $request)
    {

        try {

            App::setLocale('id');

            $validatedDataRegister = $request->validate([
                'nama_lengkap' => 'required',
                'username' => 'required|unique:users|max:50',
                'email' => 'required|unique:users|email:rfc',
                'password' => 'required|min:8',
            ]);

            // Password, Status pengguna, & role
            $validatedDataRegister['password'] = Hash::make($request->password);
            $validatedDataRegister['status_pengguna'] = "Aktif";
            $validatedDataRegister['role'] = "User";

            Users::create($validatedDataRegister);

            return redirect()->route('login')->with('status', 'success')->with('message', 'Berhasil Registrasi Data User');
        } catch (\Throwable $th) {

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function forgotPassword()
    {

        return view($this->directory . ".forgotPassword", [
            'judul' => $this->judulLupaPassword,
        ]);
    }

    public function preForgotPassword(Request $request)
    {

        try {

            // Mengkonfigurasi bahasa pesan error
            App::setLocale('id');

            $request->validate([
                'email' => 'required|exists:users',
            ]);

            return view($this->directory . ".resetPassword", [
                'judul' => $this->judulLupaPassword,
                'email' => $request->email,
            ]);
        } catch (\Throwable $th) {
            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function postForgotPassword(Request $request)
    {

        try {

            $users = Users::where('email', $request->email)->first();

            $request->validate([
                'password' => 'required|min:8',
            ]);

            if ($request->password != $request->passwordConfirm) {

                return back()->withInput()->with('status', 'error')->with('message', 'Data pada kedua kolom password tidak cocok!');
            }

            $validatedDataResetPassword['password'] = Hash::make($request->password);

            $users->update($validatedDataResetPassword);

            return redirect()->route('login')->with('status', 'success')->with('message', 'Berhasil Mengganti Password');
        } catch (\Throwable $th) {

            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }
}
