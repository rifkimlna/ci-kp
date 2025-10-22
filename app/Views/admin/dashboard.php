<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            @apply px-2 py-1 rounded-full text-xs font-semibold;
        }
        .status-pending { @apply bg-yellow-100 text-yellow-800; }
        .status-paid { @apply bg-green-100 text-green-800; }
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
                <a href="<?= base_url('/admin') ?>" class="flex items-center px-4 py-3 text-primary bg-primary/10 rounded-lg font-semibold">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="<?= base_url('/admin/transaksi') ?>" class="flex items-center px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-50 rounded-lg transition duration-300">
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
                <a href="<?= base_url('/admin/users') ?>" class="flex items-center px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-50 rounded-lg transition duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    Users
                </a>
                <a href="<?= base_url('/') ?>" class="flex items-center px-4 py-3 text-gray-600 hover:text-primary hover:bg-gray-50 rounded-lg transition duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Kembali ke Site
                </a>
                <a href="<?= base_url('/auth/logout') ?>" class="flex items-center px-4 py-3 text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
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
                    <h1 class="text-2xl font-bold text-gray-900">Dashboard Admin</h1>
                    <p class="text-gray-600">Selamat datang, <?= esc(session()->get('nama')) ?>!</p>
                </div>
                <div class="text-sm text-gray-500">
                    <?= date('l, d F Y') ?>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Users -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Users</p>
                            <p class="text-2xl font-bold text-gray-900"><?= number_format($stats['total_users']) ?></p>
                        </div>
                    </div>
                </div>

                <!-- Total Products -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Produk</p>
                            <p class="text-2xl font-bold text-gray-900"><?= number_format($stats['total_products']) ?></p>
                        </div>
                    </div>
                </div>

                <!-- Total Transactions -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Transaksi</p>
                            <p class="text-2xl font-bold text-gray-900"><?= number_format($stats['total_transactions']) ?></p>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Pendapatan</p>
                            <p class="text-2xl font-bold text-gray-900">Rp <?= number_format($stats['total_revenue'], 0, ',', '.') ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Row Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Pending Transactions -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="text-center">
                        <p class="text-sm font-medium text-gray-600">Menunggu Pembayaran</p>
                        <p class="text-2xl font-bold text-yellow-600"><?= number_format($stats['pending_transactions']) ?></p>
                    </div>
                </div>

                <!-- Pending Confirmations -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="text-center">
                        <p class="text-sm font-medium text-gray-600">Menunggu Konfirmasi</p>
                        <p class="text-2xl font-bold text-blue-600"><?= number_format($stats['pending_confirmations']) ?></p>
                    </div>
                </div>

                <!-- Active Rentals -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="text-center">
                        <p class="text-sm font-medium text-gray-600">Sewa Aktif</p>
                        <p class="text-2xl font-bold text-purple-600"><?= number_format($stats['active_rentals']) ?></p>
                    </div>
                </div>

                <!-- Total Categories -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="text-center">
                        <p class="text-sm font-medium text-gray-600">Total Kategori</p>
                        <p class="text-2xl font-bold text-green-600"><?= number_format($stats['total_categories']) ?></p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Transactions -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Transaksi Terbaru</h2>
                        <a href="<?= base_url('/admin/transaksi') ?>" class="text-primary hover:text-opacity-80 text-sm font-medium">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="space-y-4">
                        <?php if (!empty($recentTransactions)): ?>
                            <?php foreach ($recentTransactions as $transaction): ?>
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-900"><?= esc($transaction['kode_transaksi']) ?></p>
                                        <p class="text-sm text-gray-500"><?= esc($transaction['nama_user'] ?? 'User') ?></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-gray-900">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></p>
                                        <span class="status-badge status-<?= $transaction['status_pembayaran'] ?>">
                                            <?= $transaction['status_pembayaran'] == 'paid' ? 'Lunas' : 'Pending' ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-gray-500 text-center py-4">Belum ada transaksi</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Low Stock Products -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Stok Menipis</h2>
                        <a href="<?= base_url('/admin/produk') ?>" class="text-primary hover:text-opacity-80 text-sm font-medium">
                            Kelola Produk
                        </a>
                    </div>

                    <div class="space-y-4">
                        <?php if (!empty($lowStockProducts)): ?>
                            <?php foreach ($lowStockProducts as $product): ?>
                                <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-900"><?= esc($product['nama_produk']) ?></p>
                                        <p class="text-sm text-gray-500">Stok: <?= $product['stok'] ?></p>
                                    </div>
                                    <div class="text-right">
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold">
                                            Stok Rendah
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-gray-500 text-center py-4">Semua stok aman</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="<?= base_url('/admin/transaksi') ?>" class="p-4 bg-blue-50 rounded-lg text-center hover:bg-blue-100 transition duration-300">
                        <svg class="w-8 h-8 text-blue-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <p class="font-medium text-blue-900">Kelola Transaksi</p>
                    </a>

                    <a href="<?= base_url('/admin/produk') ?>" class="p-4 bg-green-50 rounded-lg text-center hover:bg-green-100 transition duration-300">
                        <svg class="w-8 h-8 text-green-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <p class="font-medium text-green-900">Kelola Produk</p>
                    </a>

                    <a href="<?= base_url('/admin/users') ?>" class="p-4 bg-purple-50 rounded-lg text-center hover:bg-purple-100 transition duration-300">
                        <svg class="w-8 h-8 text-purple-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        <p class="font-medium text-purple-900">Kelola Users</p>
                    </a>

                    <a href="<?= base_url('/') ?>" class="p-4 bg-gray-50 rounded-lg text-center hover:bg-gray-100 transition duration-300">
                        <svg class="w-8 h-8 text-gray-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <p class="font-medium text-gray-900">Lihat Website</p>
                    </a>
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>