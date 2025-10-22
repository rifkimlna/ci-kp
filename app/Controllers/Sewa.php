<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class Sewa extends BaseController
{
    protected $productModel;
    protected $transactionModel;
    protected $transactionDetailModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->transactionDetailModel = new TransactionDetailModel();

        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu untuk melakukan penyewaan');
        }
    }

    public function index($product_id)
    {
        $product = $this->productModel->getProductById($product_id);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ($product['stok'] <= 0) {
            return redirect()->back()->with('error', 'Maaf, stok produk sedang habis');
        }

        $data = [
            'title' => 'Sewa ' . $product['nama_produk'] . ' - PRORENTAL',
            'product' => $product
        ];

        return view('sewa/form_sewa', $data);
    }

    public function process()
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'produk_id' => 'required|integer',
            'tanggal_sewa' => 'required|valid_date',
            'tanggal_kembali' => 'required|valid_date',
            'jumlah' => 'required|integer|greater_than[0]',
            'metode_pembayaran' => 'required|in_list[transfer_bank,qris,cod]',
            'catatan' => 'permit_empty'
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $post = $this->request->getPost();
            $product = $this->productModel->getProductById($post['produk_id']);

            // Validasi stok
            if ($product['stok'] < $post['jumlah']) {
                throw new \Exception('Stok tidak mencukupi. Stok tersedia: ' . $product['stok']);
            }

            // Validasi tanggal
            $tanggal_sewa = new \DateTime($post['tanggal_sewa']);
            $tanggal_kembali = new \DateTime($post['tanggal_kembali']);
            $today = new \DateTime();

            if ($tanggal_sewa < $today) {
                throw new \Exception('Tanggal sewa tidak boleh kurang dari hari ini');
            }

            if ($tanggal_kembali <= $tanggal_sewa) {
                throw new \Exception('Tanggal kembali harus setelah tanggal sewa');
            }

            // Hitung lama sewa dan total harga
            $lama_sewa = $tanggal_sewa->diff($tanggal_kembali)->days;
            if ($lama_sewa < 1) $lama_sewa = 1;

            $total_harga = $lama_sewa * $product['harga_per_hari'] * $post['jumlah'];

            // Data transaksi
            $transactionData = [
                'user_id' => session()->get('id'),
                'total_harga' => $total_harga,
                'metode_pembayaran' => $post['metode_pembayaran'],
                'tanggal_sewa' => $post['tanggal_sewa'],
                'tanggal_kembali' => $post['tanggal_kembali'],
                'lama_sewa' => $lama_sewa,
                'catatan' => $post['catatan'] ?? ''
            ];

            // Create transaction
            $transaction_id = $this->transactionModel->createTransaction($transactionData);

            if (!$transaction_id) {
                throw new \Exception('Gagal membuat transaksi');
            }

            // Create transaction detail
            $detailData = [
                'transaksi_id' => $transaction_id,
                'produk_id' => $post['produk_id'],
                'harga' => $product['harga_per_hari'],
                'jumlah' => $post['jumlah'],
                'subtotal' => $total_harga
            ];

            if (!$this->transactionDetailModel->createDetail($detailData)) {
                throw new \Exception('Gagal membuat detail transaksi');
            }

            // Kurangi stok
            if (!$this->productModel->decreaseStock($post['produk_id'], $post['jumlah'])) {
                throw new \Exception('Gagal mengurangi stok');
            }

            $db->transComplete();

            // Redirect ke halaman konfirmasi
            return redirect()->to('/sewa/konfirmasi/' . $transaction_id)->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran.');

        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function konfirmasi($transaction_id)
    {
        $transaction = $this->transactionModel->getTransactionWithDetails($transaction_id);

        if (!$transaction || $transaction['user_id'] != session()->get('id')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Konfirmasi Pesanan - PRORENTAL',
            'transaction' => $transaction
        ];

        return view('sewa/konfirmasi', $data);
    }

    public function riwayat()
    {
        $transactions = $this->transactionModel->getTransactionsByUser(session()->get('id'));

        $data = [
            'title' => 'Riwayat Sewa - PRORENTAL',
            'transactions' => $transactions
        ];

        return view('sewa/riwayat', $data);
    }
}