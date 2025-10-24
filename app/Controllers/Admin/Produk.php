<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Produk extends BaseController
{
    public function index()
    {
        // Data dummy untuk testing dulu
        $data = [
            'title' => 'Kelola Produk - Admin Panel',
            'produk' => [
                [
                    'id' => 1,
                    'nama_produk' => 'Kamera Canon EOS R5',
                    'nama_kategori' => 'Kamera DSLR',
                    'harga_sewa' => 250000,
                    'stok' => 5,
                    'deskripsi' => 'Kamera profesional dengan fitur lengkap',
                    'gambar' => 'default.jpg',
                    'status' => 'active'
                ],
                [
                    'id' => 2,
                    'nama_produk' => 'Lensa Sony 50mm',
                    'nama_kategori' => 'Lensa',
                    'harga_sewa' => 80000,
                    'stok' => 3,
                    'deskripsi' => 'Lensa prime dengan bukaan besar',
                    'gambar' => 'default.jpg',
                    'status' => 'active'
                ]
            ],
            'kategori' => [
                ['id' => 1, 'nama_kategori' => 'Kamera DSLR'],
                ['id' => 2, 'nama_kategori' => 'Lensa'],
                ['id' => 3, 'nama_kategori' => 'Aksesoris']
            ]
        ];

        return view('admin/produk', $data);
    }
}