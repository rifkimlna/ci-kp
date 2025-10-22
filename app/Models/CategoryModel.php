<?php
namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'kategori_produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kategori', 'deskripsi'];
    protected $useTimestamps = true;

    public function getAllCategories()
    {
        return $this->orderBy('nama_kategori', 'ASC')->findAll();
    }

    public function getCategoryWithProductCount()
    {
        return $this->select('kategori_produk.*, COUNT(produk.id) as jumlah_produk')
            ->join('produk', 'produk.kategori_id = kategori_produk.id AND produk.status = "active"', 'left')
            ->groupBy('kategori_produk.id')
            ->orderBy('kategori_produk.nama_kategori', 'ASC')
            ->findAll();
    }
}