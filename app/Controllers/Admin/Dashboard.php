<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // Check admin role
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/auth/login')->with('error', 'Akses ditolak. Hanya admin yang bisa mengakses.');
        }

        // Get statistics using direct database queries
        $stats = $this->getDashboardStats();

        // Get recent transactions
        $recentTransactions = $this->getRecentTransactions();

        // Get low stock products
        $lowStockProducts = $this->getLowStockProducts();

        $data = [
            'title' => 'Dashboard Admin - PRORENTAL',
            'stats' => $stats,
            'recentTransactions' => $recentTransactions,
            'lowStockProducts' => $lowStockProducts
        ];

        return view('admin/dashboard', $data);
    }

    private function getDashboardStats()
    {
        $db = \Config\Database::connect();

        return [
            'total_users' => $this->getTableCount($db, 'users'),
            'total_products' => $this->getTableCount($db, 'produk'),
            'total_transactions' => $this->getTableCount($db, 'transaksi'),
            'total_categories' => $this->getTableCount($db, 'kategori_produk'),
            'pending_transactions' => $this->getCountWhere($db, 'transaksi', 'status_pembayaran', 'pending'),
            'pending_confirmations' => $this->getCountWhere($db, 'transaksi', 'status_transaksi', 'menunggu_konfirmasi'),
            'total_revenue' => $this->getTotalRevenue($db),
            'active_rentals' => $this->getActiveRentals($db)
        ];
    }

    private function getTableCount($db, $tableName)
    {
        try {
            return $db->table($tableName)->countAll();
        } catch (\Exception $e) {
            log_message('error', 'Error counting table ' . $tableName . ': ' . $e->getMessage());
            return 0;
        }
    }

    private function getCountWhere($db, $tableName, $field, $value)
    {
        try {
            return $db->table($tableName)->where($field, $value)->countAllResults();
        } catch (\Exception $e) {
            log_message('error', 'Error counting where ' . $tableName . ': ' . $e->getMessage());
            return 0;
        }
    }

    private function getTotalRevenue($db)
    {
        try {
            $result = $db->table('transaksi')
                ->selectSum('total_harga')
                ->where('status_pembayaran', 'paid')
                ->get();

            if ($result) {
                $row = $result->getRow();
                return $row->total_harga ?? 0;
            }
            return 0;
        } catch (\Exception $e) {
            log_message('error', 'Error getting total revenue: ' . $e->getMessage());
            return 0;
        }
    }

    private function getActiveRentals($db)
    {
        try {
            return $db->table('transaksi')
                ->where('status_transaksi', 'diproses')
                ->orWhere('status_transaksi', 'dikirim')
                ->countAllResults();
        } catch (\Exception $e) {
            log_message('error', 'Error getting active rentals: ' . $e->getMessage());
            return 0;
        }
    }

    private function getRecentTransactions()
    {
        try {
            $db = \Config\Database::connect();

            $transactions = $db->table('transaksi t')
                ->select('t.*, u.nama as nama_user')
                ->join('users u', 'u.id = t.user_id', 'left')
                ->orderBy('t.created_at', 'DESC')
                ->limit(5)
                ->get()
                ->getResultArray();

            return $transactions ?: [];
        } catch (\Exception $e) {
            log_message('error', 'Error getting recent transactions: ' . $e->getMessage());
            return [];
        }
    }

    private function getLowStockProducts()
    {
        try {
            $db = \Config\Database::connect();

            $products = $db->table('produk')
                ->where('stok <', 5)
                ->where('stok >', 0)
                ->get()
                ->getResultArray();

            return $products ?: [];
        } catch (\Exception $e) {
            log_message('error', 'Error getting low stock products: ' . $e->getMessage());
            return [];
        }
    }
}