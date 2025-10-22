<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#A0522D',
                        'light-bg': '#ffffff',
                        'light-section': '#FCF8F5',
                        'text-dark': '#2C1F1D',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        .status-badge {
            @apply px-3 py-1 rounded-full text-xs font-semibold;
        }
        .status-pending { @apply bg-yellow-100 text-yellow-800; }
        .status-paid { @apply bg-green-100 text-green-800; }
        .status-failed { @apply bg-red-100 text-red-800; }
        .status-refunded { @apply bg-gray-100 text-gray-800; }
        .status-menunggu_konfirmasi { @apply bg-yellow-100 text-yellow-800; }
        .status-dikonfirmasi { @apply bg-blue-100 text-blue-800; }
        .status-diproses { @apply bg-purple-100 text-purple-800; }
        .status-dikirim { @apply bg-indigo-100 text-indigo-800; }
        .status-selesai { @apply bg-green-100 text-green-800; }
        .status-dibatalkan { @apply bg-red-100 text-red-800; }
    </style>
</head>
<body class="bg-gray-50 text-text-dark font-sans antialiased">

<!-- Sidebar -->
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-lg">
        <div class="p-6">
            <a href="<?= base_url('/admin') ?>" class="text-2xl font-extrabold text-text-dark">
                <span class="text-primary font-bold">PRO</span>RENTAL
            </a>
            <p class="text-sm text-gray-500 mt-1">Admin Panel</p>
        </div>

        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="<?= base_url('/admin') ?>" class="flex items-center px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-50 rounded-lg transition duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="<?= base_url('/admin/transaksi') ?>" class="flex items-center px-4 py-3 text-primary bg-primary/10 rounded-lg font-semibold">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Transaksi
                </a>
                <a href="<?= base_url('/admin/produk') ?>" class="flex items-center px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-50 rounded-lg transition duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Produk
                </a>
                <a href="<?= base_url('/') ?>" class="flex items-center px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-50 rounded-lg transition duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Kembali ke Site
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b">
            <div class="flex justify-between items-center px-8 py-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Kelola Transaksi</h1>
                    <p class="text-gray-600">Kelola dan konfirmasi semua transaksi penyewaan</p>
                </div>
                <div class="text-sm text-gray-500">
                    <?= date('l, d F Y') ?>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-8">
            <!-- Alert Messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <!-- Filter Section -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-6">
                <h2 class="text-lg font-semibold mb-4">Filter Transaksi</h2>
                <div class="flex flex-wrap gap-4">
                    <!-- Status Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status Transaksi</label>
                        <select onchange="window.location.href=this.value" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-primary">
                            <option value="<?= base_url('/admin/transaksi') ?>">Semua Status</option>
                            <?php foreach ($status_labels as $key => $label): ?>
                                <option value="<?= base_url('/admin/transaksi?status=' . $key) ?>"
                                    <?= $current_status == $key ? 'selected' : '' ?>>
                                    <?= $label ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Payment Status Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status Pembayaran</label>
                        <select onchange="window.location.href=this.value" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-primary">
                            <option value="<?= base_url('/admin/transaksi') ?>">Semua Pembayaran</option>
                            <?php foreach ($payment_labels as $key => $label): ?>
                                <option value="<?= base_url('/admin/transaksi?payment_status=' . $key) ?>"
                                    <?= $current_payment_status == $key ? 'selected' : '' ?>>
                                    <?= $label ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Reset Filter -->
                    <div class="self-end">
                        <a href="<?= base_url('/admin/transaksi') ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
                            Reset Filter
                        </a>
                    </div>
                </div>
            </div>

            <!-- Transactions Table -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <?php if (!empty($transactions)): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pembayaran</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($transactions as $transaction): ?>
                                <tr class="hover:bg-gray-50 transition duration-300">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?= esc($transaction['kode_transaksi']) ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?= esc($transaction['nama_user']) ?></div>
                                        <div class="text-sm text-gray-500"><?= esc($transaction['email_user']) ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-gray-900">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="status-badge status-<?= $transaction['status_transaksi'] ?>">
                                                <?= $status_labels[$transaction['status_transaksi']] ?? $transaction['status_transaksi'] ?>
                                            </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="status-badge status-<?= $transaction['status_pembayaran'] ?>">
                                                <?= $payment_labels[$transaction['status_pembayaran']] ?? $transaction['status_pembayaran'] ?>
                                            </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?= date('d M Y', strtotime($transaction['created_at'])) ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="<?= base_url('/admin/transaksi/detail/' . $transaction['id']) ?>"
                                               class="text-primary hover:text-opacity-80 transition duration-300">
                                                Detail
                                            </a>

                                            <?php if ($transaction['status_pembayaran'] == 'pending'): ?>
                                                <form method="post" action="<?= base_url('/admin/transaksi/konfirmasi/' . $transaction['id']) ?>"
                                                      onsubmit="return confirm('Konfirmasi pembayaran ini?')">
                                                    <button type="submit" class="text-green-600 hover:text-green-800 transition duration-300">
                                                        Konfirmasi Bayar
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-16">
                        <div class="text-gray-400 mb-4">
                            <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-lg mb-4">Belum ada transaksi</p>
                        <p class="text-gray-400 text-sm">Transaksi akan muncul di sini ketika customer melakukan penyewaan</p>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</div>

</body>
</html>