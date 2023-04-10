<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    protected $judul = 'Miscellaneous';
    protected $menu = 'miscellaneous';
    protected $sub_menu = '';
    protected $directory = 'admin.miscellaneous';

    public function erorr()
    {

        return view($this->directory . ".error", [
            'judul' => $this->judul,
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
            'status' => 'error',
            'message' => 'Error!',
        ]);
    }
}
