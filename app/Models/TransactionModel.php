<?php
//namespace App\Models;
//
//use CodeIgniter\Model;
//
//class TransactionModel extends Model
//{
//    protected $table = 'transaksi';
//    protected $primaryKey = 'id';
//    protected $allowedFields = ['kode_transaksi', 'user_id', 'total_harga', 'status_pembayaran', 'status_transaksi', 'metode_pembayaran', 'tanggal_sewa', 'tanggal_kembali', 'lama_sewa', 'catatan'];
//    protected $useTimestamps = true;
//
//    public function generateTransactionCode()
//    {
//        $prefix = 'TRX';
//        $date = date('Ymd');
//        $random = mt_rand(1000, 9999);
//        return $prefix . $date . $random;
//    }
//
//    public function createTransaction($data)
//    {
//        $db = \Config\Database::connect();
//        $db->transStart();
//
//        try {
//            // Generate kode transaksi
//            $data['kode_transaksi'] = $this->generateTransactionCode();
//
//            // Insert transaksi
//            $this->insert($data);
//            $transaksi_id = $this->insertID();
//
//            $db->transComplete();
//
//            return $transaksi_id;
//
//        } catch (\Exception $e) {
//            $db->transRollback();
//            return false;
//        }
//    }
//
//    public function getTransactionsByUser($user_id)
//    {
//        return $this->where('user_id', $user_id)
//            ->orderBy('created_at', 'DESC')
//            ->findAll();
//    }
//
//    public function getTransactionWithDetails($transaction_id)
//    {
//        $transaction = $this->find($transaction_id);
//
//        if ($transaction) {
//            $db = \Config\Database::connect();
//            $builder = $db->table('detail_transaksi dt');
//            $builder->select('dt.*, p.nama_produk, p.gambar');
//            $builder->join('produk p', 'p.id = dt.produk_id');
//            $builder->where('dt.transaksi_id', $transaction_id);
//
//            $transaction['details'] = $builder->get()->getResultArray();
//        }
//
//        return $transaction;
//    }
//
//    // Method baru untuk riwayat dengan detail
//    public function getUserTransactionsWithDetails($user_id)
//    {
//        $transactions = $this->where('user_id', $user_id)
//            ->orderBy('created_at', 'DESC')
//            ->findAll();
//
//        if ($transactions) {
//            $db = \Config\Database::connect();
//
//            foreach ($transactions as &$transaction) {
//                $builder = $db->table('detail_transaksi dt');
//                $builder->select('dt.*, p.nama_produk, p.gambar, k.nama_kategori');
//                $builder->join('produk p', 'p.id = dt.produk_id');
//                $builder->join('kategori_produk k', 'k.id = p.kategori_id', 'left');
//                $builder->where('dt.transaksi_id', $transaction['id']);
//
//                $transaction['details'] = $builder->get()->getResultArray();
//            }
//        }
//
//        return $transactions;
//    }
//
//    // Method untuk statistik
//    public function getUserTransactionStats($user_id)
//    {
//        $db = \Config\Database::connect();
//
//        $stats = [
//            'total' => $this->where('user_id', $user_id)->countAllResults(),
//            'pending' => $this->where('user_id', $user_id)
//                ->where('status_pembayaran', 'pending')
//                ->countAllResults(),
//            'paid' => $this->where('user_id', $user_id)
//                ->where('status_pembayaran', 'paid')
//                ->countAllResults(),
//            'selesai' => $this->where('user_id', $user_id)
//                ->where('status_transaksi', 'selesai')
//                ->countAllResults()
//        ];
//
//        return $stats;
//    }
//
//
//
//}


namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_transaksi', 'user_id', 'total_harga', 'status_pembayaran', 'status_transaksi', 'metode_pembayaran', 'tanggal_sewa', 'tanggal_kembali', 'lama_sewa', 'catatan'];
    protected $useTimestamps = true;

    // Constants untuk status
    const STATUS_MENUNGGU_KONFIRMASI = 'menunggu_konfirmasi';
    const STATUS_DIKONFIRMASI = 'dikonfirmasi';
    const STATUS_DIPROSES = 'diproses';
    const STATUS_DIKIRIM = 'dikirim';
    const STATUS_SELESAI = 'selesai';
    const STATUS_DIBATALKAN = 'dibatalkan';

    const PAYMENT_PENDING = 'pending';
    const PAYMENT_PAID = 'paid';
    const PAYMENT_FAILED = 'failed';
    const PAYMENT_REFUNDED = 'refunded';

    public function generateTransactionCode()
    {
        $prefix = 'TRX';
        $date = date('Ymd');
        $random = mt_rand(1000, 9999);
        return $prefix . $date . $random;
    }

    public function createTransaction($data)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Generate kode transaksi
            $data['kode_transaksi'] = $this->generateTransactionCode();

            // Set default status jika tidak diset
            if (!isset($data['status_pembayaran'])) {
                $data['status_pembayaran'] = self::PAYMENT_PENDING;
            }
            if (!isset($data['status_transaksi'])) {
                $data['status_transaksi'] = self::STATUS_MENUNGGU_KONFIRMASI;
            }

            // Insert transaksi
            $this->insert($data);
            $transaksi_id = $this->insertID();

            $db->transComplete();

            return $transaksi_id;

        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Error createTransaction: ' . $e->getMessage());
            return false;
        }
    }

    // Method untuk konfirmasi pembayaran
    public function confirmPayment($transaction_id)
    {
        return $this->update($transaction_id, [
            'status_pembayaran' => self::PAYMENT_PAID,
            'status_transaksi' => self::STATUS_DIKONFIRMASI,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    // Method untuk update status transaksi
    public function updateStatus($transaction_id, $status)
    {
        $allowed_status = [
            self::STATUS_MENUNGGU_KONFIRMASI,
            self::STATUS_DIKONFIRMASI,
            self::STATUS_DIPROSES,
            self::STATUS_DIKIRIM,
            self::STATUS_SELESAI,
            self::STATUS_DIBATALKAN
        ];

        if (!in_array($status, $allowed_status)) {
            return false;
        }

        return $this->update($transaction_id, [
            'status_transaksi' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    // Method untuk membatalkan transaksi
    public function cancelTransaction($transaction_id)
    {
        return $this->update($transaction_id, [
            'status_pembayaran' => self::PAYMENT_FAILED,
            'status_transaksi' => self::STATUS_DIBATALKAN,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function getTransactionsByUser($user_id)
    {
        return $this->where('user_id', $user_id)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    public function getTransactionWithDetails($transaction_id)
    {
        $transaction = $this->find($transaction_id);

        if ($transaction) {
            $db = \Config\Database::connect();
            $builder = $db->table('detail_transaksi dt');
            $builder->select('dt.*, p.nama_produk, p.gambar');
            $builder->join('produk p', 'p.id = dt.produk_id');
            $builder->where('dt.transaksi_id', $transaction_id);

            $transaction['details'] = $builder->get()->getResultArray();
        }

        return $transaction;
    }

    // Method baru untuk riwayat dengan detail
    public function getUserTransactionsWithDetails($user_id)
    {
        $transactions = $this->where('user_id', $user_id)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        if ($transactions) {
            $db = \Config\Database::connect();

            foreach ($transactions as &$transaction) {
                $builder = $db->table('detail_transaksi dt');
                $builder->select('dt.*, p.nama_produk, p.gambar, k.nama_kategori');
                $builder->join('produk p', 'p.id = dt.produk_id');
                $builder->join('kategori_produk k', 'k.id = p.kategori_id', 'left');
                $builder->where('dt.transaksi_id', $transaction['id']);

                $transaction['details'] = $builder->get()->getResultArray();
            }
        }

        return $transactions;
    }

    // Method untuk statistik
    public function getUserTransactionStats($user_id)
    {
        $stats = [
            'total' => $this->where('user_id', $user_id)->countAllResults(),
            'pending' => $this->where('user_id', $user_id)
                ->where('status_pembayaran', self::PAYMENT_PENDING)
                ->countAllResults(),
            'paid' => $this->where('user_id', $user_id)
                ->where('status_pembayaran', self::PAYMENT_PAID)
                ->countAllResults(),
            'menunggu_konfirmasi' => $this->where('user_id', $user_id)
                ->where('status_transaksi', self::STATUS_MENUNGGU_KONFIRMASI)
                ->countAllResults(),
            'dikonfirmasi' => $this->where('user_id', $user_id)
                ->where('status_transaksi', self::STATUS_DIKONFIRMASI)
                ->countAllResults(),
            'diproses' => $this->where('user_id', $user_id)
                ->where('status_transaksi', self::STATUS_DIPROSES)
                ->countAllResults(),
            'dikirim' => $this->where('user_id', $user_id)
                ->where('status_transaksi', self::STATUS_DIKIRIM)
                ->countAllResults(),
            'selesai' => $this->where('user_id', $user_id)
                ->where('status_transaksi', self::STATUS_SELESAI)
                ->countAllResults(),
            'dibatalkan' => $this->where('user_id', $user_id)
                ->where('status_transaksi', self::STATUS_DIBATALKAN)
                ->countAllResults()
        ];

        return $stats;
    }

    // Method untuk mendapatkan semua transaksi (admin)
    public function getAllTransactionsWithDetails()
    {
        $transactions = $this->select('transaksi.*, users.nama as nama_user, users.email as email_user')
            ->join('users', 'users.id = transaksi.user_id')
            ->orderBy('transaksi.created_at', 'DESC')
            ->findAll();

        if ($transactions) {
            $db = \Config\Database::connect();

            foreach ($transactions as &$transaction) {
                $builder = $db->table('detail_transaksi dt');
                $builder->select('dt.*, p.nama_produk, p.gambar');
                $builder->join('produk p', 'p.id = dt.produk_id');
                $builder->where('dt.transaksi_id', $transaction['id']);

                $transaction['details'] = $builder->get()->getResultArray();
            }
        }

        return $transactions;
    }

    // Method untuk mendapatkan transaksi by status
    public function getTransactionsByStatus($status)
    {
        return $this->where('status_transaksi', $status)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    // Method untuk mendapatkan label status
    public function getStatusLabel($status)
    {
        $labels = [
            self::STATUS_MENUNGGU_KONFIRMASI => 'Menunggu Konfirmasi',
            self::STATUS_DIKONFIRMASI => 'Terkonfirmasi',
            self::STATUS_DIPROSES => 'Diproses',
            self::STATUS_DIKIRIM => 'Dikirim',
            self::STATUS_SELESAI => 'Selesai',
            self::STATUS_DIBATALKAN => 'Dibatalkan'
        ];

        return $labels[$status] ?? $status;
    }

    // Method untuk mendapatkan label pembayaran
    public function getPaymentLabel($status)
    {
        $labels = [
            self::PAYMENT_PENDING => 'Menunggu Pembayaran',
            self::PAYMENT_PAID => 'Sudah Dibayar',
            self::PAYMENT_FAILED => 'Gagal',
            self::PAYMENT_REFUNDED => 'Dikembalikan'
        ];

        return $labels[$status] ?? $status;
    }
}