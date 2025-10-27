<?php

// namespace App\Controllers;

// use App\Models\ProdukModel;
// use App\Models\KategoriModel;

// class KatalogController extends BaseController
// {
//     public function index()
//     {
//         // Kode katalog yang sudah ada
//         $produkModel = new ProdukModel();
//         $kategoriModel = new KategoriModel();
        
//         $kategori = $this->request->getGet('kategori');
//         $search = $this->request->getGet('search');
        
//         $query = $produkModel->select('produk.*, kategori.nama_kategori')
//                            ->join('kategori', 'kategori.id = produk.kategori_id');
        
//         if ($kategori) {
//             $query->where('produk.kategori_id', $kategori);
//         }
        
//         if ($search) {
//             $query->groupStart()
//                   ->like('produk.nama_produk', $search)
//                   ->orLike('produk.deskripsi', $search)
//                   ->orLike('kategori.nama_kategori', $search)
//                   ->groupEnd();
//         }
        
//         $data = [
//             'title' => 'Katalog Produk',
//             'products' => $query->findAll(),
//             'categories' => $kategoriModel->findAll(),
//             'current_category' => $kategori,
//             'search_keyword' => $search
//         ];
        
//         return view('katalog', $data);
//     }
    
//     public function detail($id)
// {
//     $produkModel = new ProdukModel();
//     $kategoriModel = new KategoriModel();
    
//     // Ambil data produk dengan join kategori
//     $product = $produkModel->select('produk.*, kategori.nama_kategori')
//                           ->join('kategori', 'kategori.id = produk.kategori_id')
//                           ->where('produk.id', $id)
//                           ->first();
    
//     if (!$product) {
//         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
//     }
    
//     // Ambil produk terkait (dari kategori yang sama)
//     $related_products = $produkModel->select('produk.*, kategori.nama_kategori')
//                                   ->join('kategori', 'kategori.id = produk.kategori_id')
//                                   ->where('produk.id !=', $id)
//                                   ->where('produk.kategori_id', $product['kategori_id'])
//                                   ->where('produk.stok >', 0)
//                                   ->limit(4)
//                                   ->findAll();
    
//     $data = [
//         'title' => $product['nama_produk'],
//         'product' => $product,
//         'related_products' => $related_products
//     ];
    
//     return view('sewa/detail_produk', $data);
// }
// }


namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;

class KatalogController extends BaseController
{
    public function index()
    {
        // Kode katalog yang sudah ada
        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();
        
        $kategori = $this->request->getGet('kategori');
        $search = $this->request->getGet('search');
        
        // Filter baru: merek dan rentang harga
        $merek = $this->request->getGet('merek');
        $min_harga = $this->request->getGet('min_harga');
        $max_harga = $this->request->getGet('max_harga');
        $stok = $this->request->getGet('stok');
        
        $query = $produkModel->select('produk.*, kategori.nama_kategori')
                           ->join('kategori', 'kategori.id = produk.kategori_id');
        
        if ($kategori) {
            $query->where('produk.kategori_id', $kategori);
        }
        
        if ($search) {
            $query->groupStart()
                  ->like('produk.nama_produk', $search)
                  ->orLike('produk.deskripsi', $search)
                  ->orLike('kategori.nama_kategori', $search)
                  ->groupEnd();
        }
        
        // Filter merek
        if ($merek) {
            $query->like('produk.nama_produk', $merek)
                  ->orLike('produk.spesifikasi', $merek);
        }
        
        // Filter rentang harga
        if ($min_harga) {
            $query->where('produk.harga_per_hari >=', $min_harga);
        }
        
        if ($max_harga) {
            $query->where('produk.harga_per_hari <=', $max_harga);
        }
        
        // Filter stok
        if ($stok) {
            $query->where('produk.stok >', 0);
        }
        
        $data = [
            'title' => 'Katalog Produk',
            'products' => $query->findAll(),
            'categories' => $kategoriModel->findAll(),
            'current_category' => $kategori,
            'search_keyword' => $search,
            // Data filter baru
            'current_merek' => $merek,
            'current_min_harga' => $min_harga,
            'current_max_harga' => $max_harga,
            'current_stok' => $stok
        ];
        
        return view('katalog', $data);
    }
    
    public function detail($id)
    {
        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();
        
        // Ambil data produk dengan join kategori
        $product = $produkModel->select('produk.*, kategori.nama_kategori')
                              ->join('kategori', 'kategori.id = produk.kategori_id')
                              ->where('produk.id', $id)
                              ->first();
        
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        // Ambil produk terkait (dari kategori yang sama)
        $related_products = $produkModel->select('produk.*, kategori.nama_kategori')
                                      ->join('kategori', 'kategori.id = produk.kategori_id')
                                      ->where('produk.id !=', $id)
                                      ->where('produk.kategori_id', $product['kategori_id'])
                                      ->where('produk.stok >', 0)
                                      ->limit(4)
                                      ->findAll();
        
        $data = [
            'title' => $product['nama_produk'],
            'product' => $product,
            'related_products' => $related_products
        ];
        
        return view('sewa/detail_produk', $data);
    }
}