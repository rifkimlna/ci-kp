<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    public function index()
    {
        // Check admin role
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/auth/login')->with('error', 'Akses ditolak. Hanya admin yang bisa mengakses.');
        }

        try {
            // Get filter parameters
            $status = $this->request->getGet('status');
            $payment_status = $this->request->getGet('payment_status');

            // Get transactions with filter
            $transactions = $this->getTransactions($status, $payment_status);

            $data = [
                'title' => 'Kelola Transaksi - Admin',
                'transactions' => $transactions,
                'current_status' => $status,
                'current_payment_status' => $payment_status,
                'status_labels' => $this->getStatusLabels(),
                'payment_labels' => $this->getPaymentLabels()
            ];

            return view('admin/transaksi/index', $data);

        } catch (\Exception $e) {
            log_message('error', 'Error in Admin\Transaksi::index: ' . $e->getMessage());

            // Fallback data jika error
            $data = [
                'title' => 'Kelola Transaksi - Admin',
                'transactions' => [],
                'current_status' => null,
                'current_payment_status' => null,
                'status_labels' => $this->getStatusLabels(),
                'payment_labels' => $this->getPaymentLabels()
            ];

            return view('admin/transaksi/index', $data);
        }
    }

    public function detail($id)
    {
        // Check admin role
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/auth/login')->with('error', 'Akses ditolak. Hanya admin yang bisa mengakses.');
        }

        try {
            $transaction = $this->getTransactionWithDetails($id);

            if (!$transaction) {
                return redirect()->to('/admin/transaksi')->with('error', 'Transaksi tidak ditemukan.');
            }

            $data = [
                'title' => 'Detail Transaksi - ' . $transaction['kode_transaksi'],
                'transaction' => $transaction,
                'status_labels' => $this->getStatusLabels(),
                'payment_labels' => $this->getPaymentLabels()
            ];

            return view('admin/transaksi/detail', $data);

        } catch (\Exception $e) {
            log_message('error', 'Error in Admin\Transaksi::detail: ' . $e->getMessage());
            return redirect()->to('/admin/transaksi')->with('error', 'Terjadi error: ' . $e->getMessage());
        }
    }

    public function konfirmasiPembayaran($id)
    {
        // Check admin role
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/auth/login')->with('error', 'Akses ditolak. Hanya admin yang bisa mengakses.');
        }

        $db = \Config\Database::connect();

        try {
            $db->transStart();

            // Update transaction status to confirmed
            $result = $db->table('transaksi')
                ->where('id', $id)
                ->update([
                    'status_pembayaran' => 'paid',
                    'status_transaksi' => 'dikonfirmasi',
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            $db->transComplete();

            if ($result) {
                return redirect()->to('/admin/transaksi/detail/' . $id)->with('success', 'Pembayaran berhasil dikonfirmasi.');
            } else {
                return redirect()->back()->with('error', 'Gagal mengkonfirmasi pembayaran: Transaksi tidak ditemukan.');
            }

        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Error in konfirmasiPembayaran: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengkonfirmasi pembayaran: ' . $e->getMessage());
        }
    }

    public function updateStatus($id)
    {
        // Check admin role
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/auth/login')->with('error', 'Akses ditolak. Hanya admin yang bisa mengakses.');
        }

        // Log untuk debugging
        log_message('debug', 'UpdateStatus called for ID: ' . $id);
        log_message('debug', 'Method: ' . $this->request->getMethod());
        log_message('debug', 'POST data: ' . print_r($this->request->getPost(), true));

        $status = $this->request->getPost('status');

        if (!$status) {
            return redirect()->back()->with('error', 'Status tidak boleh kosong.');
        }

        $allowed_status = ['menunggu_konfirmasi', 'dikonfirmasi', 'diproses', 'dikirim', 'selesai'];

        if (!in_array($status, $allowed_status)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $db = \Config\Database::connect();

        try {
            $result = $db->table('transaksi')
                ->where('id', $id)
                ->update([
                    'status_transaksi' => $status,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            log_message('debug', 'Update result: ' . ($result ? 'true' : 'false'));

            if ($result) {
                return redirect()->back()->with('success', 'Status transaksi berhasil diupdate menjadi: ' . $this->getStatusLabels()[$status]);
            } else {
                return redirect()->back()->with('error', 'Gagal mengupdate status. Mungkin data tidak berubah.');
            }

        } catch (\Exception $e) {
            log_message('error', 'Error in updateStatus: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate status: ' . $e->getMessage());
        }
    }

    public function batalkan($id)
    {
        // Check admin role
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/auth/login')->with('error', 'Akses ditolak. Hanya admin yang bisa mengakses.');
        }

        $db = \Config\Database::connect();

        try {
            $db->transStart();

            // Get transaction details to restore stock
            $details = $db->table('detail_transaksi')
                ->where('transaksi_id', $id)
                ->get()
                ->getResultArray();

            // Restore product stock
            foreach ($details as $detail) {
                $db->table('produk')
                    ->set('stok', 'stok + ' . $detail['jumlah'], false)
                    ->where('id', $detail['produk_id'])
                    ->update();
            }

            // Update transaction status
            $result = $db->table('transaksi')
                ->where('id', $id)
                ->update([
                    'status_pembayaran' => 'failed',
                    'status_transaksi' => 'dibatalkan',
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            $db->transComplete();

            if ($result) {
                return redirect()->to('/admin/transaksi')->with('success', 'Transaksi berhasil dibatalkan dan stok dikembalikan.');
            } else {
                return redirect()->back()->with('error', 'Gagal membatalkan transaksi: Transaksi tidak ditemukan.');
            }

        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Error in batalkan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal membatalkan transaksi: ' . $e->getMessage());
        }
    }

    private function getTransactions($status = null, $payment_status = null)
    {
        try {
            $db = \Config\Database::connect();

            $builder = $db->table('transaksi t')
                ->select('t.*, u.nama as nama_user, u.email as email_user, u.telepon')
                ->join('users u', 'u.id = t.user_id', 'left');

            // Apply filters
            if ($status && $status != 'all') {
                $builder->where('t.status_transaksi', $status);
            }

            if ($payment_status && $payment_status != 'all') {
                $builder->where('t.status_pembayaran', $payment_status);
            }

            $result = $builder->orderBy('t.created_at', 'DESC')
                ->get();

            return $result->getResultArray();

        } catch (\Exception $e) {
            log_message('error', 'Error getting transactions: ' . $e->getMessage());
            return [];
        }
    }

    private function getTransactionWithDetails($id)
    {
        try {
            $db = \Config\Database::connect();

            // Get transaction
            $transaction = $db->table('transaksi t')
                ->select('t.*, u.nama as nama_user, u.email, u.telepon, u.alamat')
                ->join('users u', 'u.id = t.user_id', 'left')
                ->where('t.id', $id)
                ->get()
                ->getRowArray();

            if (!$transaction) {
                return null;
            }

            // Get transaction details
            $details = $db->table('detail_transaksi dt')
                ->select('dt.*, p.nama_produk, p.gambar, p.harga_per_hari')
                ->join('produk p', 'p.id = dt.produk_id', 'left')
                ->where('dt.transaksi_id', $id)
                ->get()
                ->getResultArray();

            $transaction['details'] = $details;

            return $transaction;

        } catch (\Exception $e) {
            log_message('error', 'Error getting transaction details: ' . $e->getMessage());
            return null;
        }
    }


    private function getStatusLabels()
    {
        return [
            'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
            'dikonfirmasi' => 'Terkonfirmasi',
            'diproses' => 'Diproses',
            'dikirim' => 'Dikirim',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan'
        ];
    }

    private function getPaymentLabels()
    {
        return [
            'pending' => 'Menunggu Bayar',
            'paid' => 'Lunas',
            'failed' => 'Gagal',
            'refunded' => 'Dikembalikan'
        ];
    }
}