<?php
namespace App\Controllers;

use App\Models\TransactionModel;

class Riwayat extends BaseController
{
    protected $transactionModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();

        // Check login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu');
        }
    }

    public function index()
    {
        $user_id = session()->get('id');
        $filter = $this->request->getGet('filter');

        // Get transactions berdasarkan filter
        $transactions = $this->getFilteredTransactions($user_id, $filter);
        $stats = $this->transactionModel->getUserTransactionStats($user_id);

        $data = [
            'title' => 'Riwayat Transaksi - PRORENTAL',
            'transactions' => $transactions,
            'stats' => $stats,
            'current_filter' => $filter,
            'pager' => null
        ];

        return view('riwayat/index', $data);
    }

    public function detail($transaction_id)
    {
        $user_id = session()->get('id');
        $transaction = $this->transactionModel->getTransactionWithDetails($transaction_id);

        // Validasi pemilik transaksi
        if (!$transaction || $transaction['user_id'] != $user_id) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Detail Transaksi - ' . $transaction['kode_transaksi'],
            'transaction' => $transaction
        ];

        return view('riwayat/detail', $data);
    }

    private function getFilteredTransactions($user_id, $filter = null)
    {
        $builder = $this->transactionModel->where('user_id', $user_id);

        switch ($filter) {
            case 'pending':
                $builder->where('status_pembayaran', 'pending');
                break;
            case 'paid':
                $builder->where('status_pembayaran', 'paid');
                break;
            case 'diproses':
                $builder->where('status_transaksi', 'diproses');
                break;
            case 'dikirim':
                $builder->where('status_transaksi', 'dikirim');
                break;
            case 'selesai':
                $builder->where('status_transaksi', 'selesai');
                break;
            case 'dibatalkan':
                $builder->where('status_transaksi', 'dibatalkan');
                break;
        }

        return $builder->orderBy('created_at', 'DESC')->findAll();
    }

    public function batalkan($transaction_id)
    {
        $user_id = session()->get('id');
        $transaction = $this->transactionModel->find($transaction_id);

        // Validasi pemilik dan status
        if (!$transaction || $transaction['user_id'] != $user_id) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Hanya bisa batalkan jika masih pending
        if ($transaction['status_pembayaran'] != 'pending') {
            return redirect()->back()->with('error', 'Tidak dapat membatalkan transaksi yang sudah dibayar');
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Update status transaksi
            $this->transactionModel->update($transaction_id, [
                'status_transaksi' => 'dibatalkan',
                'status_pembayaran' => 'failed'
            ]);

            // Kembalikan stok produk
            $detailModel = new \App\Models\TransactionDetailModel();
            $details = $detailModel->getDetailsByTransaction($transaction_id);

            $productModel = new \App\Models\ProductModel();
            foreach ($details as $detail) {
                $productModel->increaseStock($detail['produk_id'], $detail['jumlah']);
            }

            $db->transComplete();

            return redirect()->to('/riwayat')->with('success', 'Transaksi berhasil dibatalkan');

        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Gagal membatalkan transaksi: ' . $e->getMessage());
        }
    }
}