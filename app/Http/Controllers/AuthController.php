<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
