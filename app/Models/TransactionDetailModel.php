<?php
namespace App\Models;

use CodeIgniter\Model;

class TransactionDetailModel extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['transaksi_id', 'produk_id', 'harga', 'jumlah', 'subtotal'];

    public function createDetail($data)
    {
        return $this->insert($data);
    }

    public function getDetailsByTransaction($transaction_id)
    {
        return $this->select('detail_transaksi.*, produk.nama_produk, produk.gambar')
            ->join('produk', 'produk.id = detail_transaksi.produk_id')
            ->where('transaksi_id', $transaction_id)
            ->findAll();
    }
}