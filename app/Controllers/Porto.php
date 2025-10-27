<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Porto extends Controller
{
    public function index()
    {
        // Judul halaman
        $data['title'] = 'Portofolio';

        // Load tampilan porto.php
        return view('porto/porto', $data);
    }
}
