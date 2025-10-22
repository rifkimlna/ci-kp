<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kategori_id', 'nama_produk', 'deskripsi', 'spesifikasi', 'harga_per_hari', 'stok', 'gambar', 'status'];
    protected $useTimestamps = true;

    public function getFeaturedProducts($limit = 6)
    {
        return $this->select('produk.*, kategori_produk.nama_kategori as kategori')
            ->join('kategori_produk', 'kategori_produk.id = produk.kategori_id', 'left')
            ->where('produk.status', 'active')
            ->where('produk.stok >', 0)
            ->orderBy('produk.created_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }

    public function getProductsWithCategory()
    {
        return $this->select('produk.*, kategori_produk.nama_kategori as kategori')
            ->join('kategori_produk', 'kategori_produk.id = produk.kategori_id', 'left')
            ->where('produk.status', 'active')
            ->orderBy('produk.nama_produk', 'ASC')
            ->findAll();
    }

    public function getProductById($id)
    {
        return $this->select('produk.*, kategori_produk.nama_kategori as kategori')
            ->join('kategori_produk', 'kategori_produk.id = produk.kategori_id', 'left')
            ->where('produk.id', $id)
            ->where('produk.status', 'active')
            ->first();
    }

    public function getProductsByCategory($category_id)
    {
        return $this->select('produk.*, kategori_produk.nama_kategori as kategori')
            ->join('kategori_produk', 'kategori_produk.id = produk.kategori_id', 'left')
            ->where('produk.kategori_id', $category_id)
            ->where('produk.status', 'active')
            ->findAll();
    }

    public function searchProducts($keyword)
    {
        return $this->select('produk.*, kategori_produk.nama_kategori as kategori')
            ->join('kategori_produk', 'kategori_produk.id = produk.kategori_id', 'left')
            ->groupStart()
            ->like('produk.nama_produk', $keyword)
            ->orLike('produk.deskripsi', $keyword)
            ->orLike('kategori_produk.nama_kategori', $keyword)
            ->groupEnd()
            ->where('produk.status', 'active')
            ->findAll();
    }

    public function decreaseStock($product_id, $quantity)
    {
        $product = $this->find($product_id);
        if ($product && $product['stok'] >= $quantity) {
            $this->set('stok', 'stok - ' . $quantity, false)
                ->where('id', $product_id)
                ->update();
            return true;
        }
        return false;
    }

    public function increaseStock($product_id, $quantity)
    {
        $this->set('stok', 'stok + ' . $quantity, false)
            ->where('id', $product_id)
            ->update();
        return true;
    }
}