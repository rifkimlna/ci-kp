<?php
// namespace App\Controllers\Admin;

// use App\Controllers\BaseController;
// use App\Models\ProdukModel;

// class ProdukController extends BaseController
// {
//     public function index()
//     {
//         $produkModel = new ProdukModel();
//         $data['produk'] = $produkModel->findAll();
//         return view('admin/produk/index', $data);
//     }

//     public function tambah()
//     {
//         return view('admin/produk/tambah');
//     }

//     public function simpan()
//     {
//         $produkModel = new ProdukModel();
//         $file = $this->request->getFile('gambar');
//         $namaGambar = null;

//         if ($file && $file->isValid() && !$file->hasMoved()) {
//             $namaGambar = $file->getRandomName();
//             $file->move('uploads/produk', $namaGambar);
//         }

//         $produkModel->save([
//             'kategori_id' => $this->request->getVar('kategori_id'),
//             'nama_produk' => $this->request->getVar('nama_produk'),
//             'deskripsi' => $this->request->getVar('deskripsi'),
//             'spesifikasi' => $this->request->getVar('spesifikasi'),
//             'harga_per_hari' => $this->request->getVar('harga_per_hari'),
//             'stok' => $this->request->getVar('stok'),
//             'status' => $this->request->getVar('status'),
//             'gambar' => $namaGambar
//         ]);

//         return redirect()->to('/admin/produk')->with('success', 'Produk berhasil ditambahkan!');
//     }

//     public function edit($id)
//     {
//         $produkModel = new ProdukModel();
//         $data['produk'] = $produkModel->find($id);
//         return view('admin/produk/edit', $data);
//     }

//     public function update($id)
//     {
//         $produkModel = new ProdukModel();
//         $produk = $produkModel->find($id);
//         $file = $this->request->getFile('gambar');
//         $namaGambar = $produk['gambar'];

//         if ($file && $file->isValid() && !$file->hasMoved()) {
//             if ($namaGambar && file_exists('uploads/produk/' . $namaGambar)) {
//                 unlink('uploads/produk/' . $namaGambar);
//             }
//             $namaGambar = $file->getRandomName();
//             $file->move('uploads/produk', $namaGambar);
//         }

//         $produkModel->update($id, [
//             'kategori_id' => $this->request->getVar('kategori_id'),
//             'nama_produk' => $this->request->getVar('nama_produk'),
//             'deskripsi' => $this->request->getVar('deskripsi'),
//             'spesifikasi' => $this->request->getVar('spesifikasi'),
//             'harga_per_hari' => $this->request->getVar('harga_per_hari'),
//             'stok' => $this->request->getVar('stok'),
//             'status' => $this->request->getVar('status'),
//             'gambar' => $namaGambar
//         ]);

//         return redirect()->to('/admin/produk')->with('success', 'Produk berhasil diperbarui!');
//     }

//     public function hapus($id)
//     {
//         $produkModel = new ProdukModel();
//         $produk = $produkModel->find($id);

//         if ($produk && $produk['gambar'] && file_exists('uploads/produk/' . $produk['gambar'])) {
//             unlink('uploads/produk/' . $produk['gambar']);
//         }

//         $produkModel->delete($id);
//         return redirect()->to('/admin/produk')->with('success', 'Produk berhasil dihapus!');
//     }
// }

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProdukController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['produk'] = $productModel->findAll();
        return view('admin/produk/index', $data);
    }

    public function tambah()
    {
        return view('admin/produk/tambah');
    }

    public function simpan()
    {
        $productModel = new ProductModel();
        $file = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/produk', $namaGambar);
        }

        $productModel->save([
            'kategori_id' => $this->request->getVar('kategori_id'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'spesifikasi' => $this->request->getVar('spesifikasi'),
            'harga_per_hari' => $this->request->getVar('harga_per_hari'),
            'stok' => $this->request->getVar('stok'),
            'status' => $this->request->getVar('status'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $data['produk'] = $productModel->find($id);
        return view('admin/produk/edit', $data);
    }

    public function update($id)
    {
        $productModel = new ProductModel();
        $produk = $productModel->find($id);
        $file = $this->request->getFile('gambar');
        $namaGambar = $produk['gambar'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($namaGambar && file_exists('uploads/produk/' . $namaGambar)) {
                unlink('uploads/produk/' . $namaGambar);
            }
            $namaGambar = $file->getRandomName();
            $file->move('uploads/produk', $namaGambar);
        }

        $productModel->update($id, [
            'kategori_id' => $this->request->getVar('kategori_id'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'spesifikasi' => $this->request->getVar('spesifikasi'),
            'harga_per_hari' => $this->request->getVar('harga_per_hari'),
            'stok' => $this->request->getVar('stok'),
            'status' => $this->request->getVar('status'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $productModel = new ProductModel();
        $produk = $productModel->find($id);

        if ($produk && $produk['gambar'] && file_exists('uploads/produk/' . $produk['gambar'])) {
            unlink('uploads/produk/' . $produk['gambar']);
        }

        $productModel->delete($id);
        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil dihapus!');
    }
}