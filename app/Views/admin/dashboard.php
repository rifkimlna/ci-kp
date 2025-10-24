<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#38BDF8",
                        "background-light": "#f6f7f8",
                        "background-dark": "#0A192F",
                        "component-background-dark": "#1E293B",
                        "text-primary-dark": "#E2E8F0",
                        "text-secondary-dark": "#94A3B8",
                        error: "#F87171",
                        success: "#4ADE80",
                        warning: "#FBBF24",
                        purple: {
                            500: '#A855F7',
                            600: '#9333EA'
                        }
                    },
                    fontFamily: {
                        display: ["Space Grotesk", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                        lg: "0.75rem",
                        xl: "1rem",
                        full: "9999px",
                    },
                },
            },
        };
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
        }
        .sidebar-icon {
            @apply w-5 h-5 mr-3;
        }
        .stat-card {
            @apply bg-component-background-dark p-6 rounded-xl border border-component-background-dark hover:border-primary/30 transition-all duration-300;
        }
        .quick-action-card {
            @apply bg-component-background-dark p-6 rounded-xl border border-component-background-dark hover:border-primary/50 hover:scale-105 transition-all duration-300 cursor-pointer;
        }
    </style>
</head>
<body class="bg-background-dark font-display text-text-primary-dark">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="w-64 bg-component-background-dark border-r border-component-background-dark flex flex-col">
        <!-- Logo -->
        <div class="p-6 border-b border-component-background-dark">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-text-primary-dark">Sewa Kamera</h1>
                    <p class="text-text-secondary-dark text-sm">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="<?= base_url('/admin') ?>" class="flex items-center px-4 py-3 bg-primary/20 text-primary rounded-xl font-semibold border border-primary/30">
                <span class="material-symbols-outlined sidebar-icon">dashboard</span>
                Dashboard
            </a>
            <a href="<?= base_url('/admin/transaksi') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined sidebar-icon">receipt_long</span>
                Transaksi
            </a>
            <a href="<?= base_url('/admin/produk') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined sidebar-icon">inventory_2</span>
                Produk
            </a>
            <a href="<?= base_url('/admin/users') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined sidebar-icon">group</span>
                Users
            </a>
            <a href="<?= base_url('/') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined sidebar-icon">public</span>
                Kembali ke Site
            </a>
        </nav>

        <!-- User & Logout -->
        <div class="p-4 border-t border-component-background-dark">
            <div class="flex items-center space-x-3 mb-4 p-3 bg-background-dark rounded-xl">
                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                    <span class="text-white text-sm font-bold"><?= substr(esc(session()->get('nama')), 0, 1) ?></span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-text-primary-dark text-sm font-medium truncate"><?= esc(session()->get('nama')) ?></p>
                    <p class="text-text-secondary-dark text-xs">Administrator</p>
                </div>
            </div>
            <a href="<?= base_url('/auth/logout') ?>" class="flex items-center px-4 py-3 text-error hover:bg-error/10 rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined sidebar-icon">logout</span>
                Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="bg-component-background-dark border-b border-component-background-dark px-8 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-text-primary-dark">Dashboard Overview</h1>
                    <p class="text-text-secondary-dark">Selamat datang kembali, <?= esc(session()->get('nama')) ?>! 👋</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-background-dark px-4 py-2 rounded-xl border border-component-background-dark">
                        <p class="text-text-primary-dark text-sm font-medium"><?= date('l, d F Y') ?></p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto p-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Users -->
                <div class="stat-card group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-text-secondary-dark text-sm font-medium">Total Users</p>
                            <p class="text-3xl font-bold text-text-primary-dark mt-2"><?= number_format($stats['total_users']) ?></p>
                        </div>
                        <div class="p-3 bg-blue-500/10 rounded-xl group-hover:bg-blue-500/20 transition-colors">
                            <span class="material-symbols-outlined text-blue-400">group</span>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <span class="text-success text-sm font-medium">+12%</span>
                        <span class="text-text-secondary-dark text-sm ml-2">dari bulan lalu</span>
                    </div>
                </div>

                <!-- Total Products -->
                <div class="stat-card group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-text-secondary-dark text-sm font-medium">Total Produk</p>
                            <p class="text-3xl font-bold text-text-primary-dark mt-2"><?= number_format($stats['total_products']) ?></p>
                        </div>
                        <div class="p-3 bg-green-500/10 rounded-xl group-hover:bg-green-500/20 transition-colors">
                            <span class="material-symbols-outlined text-green-400">inventory_2</span>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <span class="text-success text-sm font-medium">+5%</span>
                        <span class="text-text-secondary-dark text-sm ml-2">produk baru</span>
                    </div>
                </div>

                <!-- Total Transactions -->
                <div class="stat-card group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-text-secondary-dark text-sm font-medium">Total Transaksi</p>
                            <p class="text-3xl font-bold text-text-primary-dark mt-2"><?= number_format($stats['total_transactions']) ?></p>
                        </div>
                        <div class="p-3 bg-purple-500/10 rounded-xl group-hover:bg-purple-500/20 transition-colors">
                            <span class="material-symbols-outlined text-purple-400">receipt_long</span>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <span class="text-success text-sm font-medium">+18%</span>
                        <span class="text-text-secondary-dark text-sm ml-2">peningkatan</span>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="stat-card group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-text-secondary-dark text-sm font-medium">Total Pendapatan</p>
                            <p class="text-3xl font-bold text-text-primary-dark mt-2">Rp <?= number_format($stats['total_revenue'], 0, ',', '.') ?></p>
                        </div>
                        <div class="p-3 bg-yellow-500/10 rounded-xl group-hover:bg-yellow-500/20 transition-colors">
                            <span class="material-symbols-outlined text-yellow-400">payments</span>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <span class="text-success text-sm font-medium">+22%</span>
                        <span class="text-text-secondary-dark text-sm ml-2">dari bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Second Row Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Pending Transactions -->
                <div class="bg-component-background-dark p-6 rounded-xl border border-component-background-dark text-center hover:border-warning/30 transition-all duration-300">
                    <div class="w-12 h-12 bg-warning/10 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <span class="material-symbols-outlined text-warning">pending</span>
                    </div>
                    <p class="text-text-secondary-dark text-sm font-medium">Menunggu Pembayaran</p>
                    <p class="text-2xl font-bold text-warning mt-2"><?= number_format($stats['pending_transactions']) ?></p>
                </div>

                <!-- Pending Confirmations -->
                <div class="bg-component-background-dark p-6 rounded-xl border border-component-background-dark text-center hover:border-blue-400/30 transition-all duration-300">
                    <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <span class="material-symbols-outlined text-blue-400">schedule</span>
                    </div>
                    <p class="text-text-secondary-dark text-sm font-medium">Menunggu Konfirmasi</p>
                    <p class="text-2xl font-bold text-blue-400 mt-2"><?= number_format($stats['pending_confirmations']) ?></p>
                </div>

                <!-- Active Rentals -->
                <div class="bg-component-background-dark p-6 rounded-xl border border-component-background-dark text-center hover:border-purple-400/30 transition-all duration-300">
                    <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <span class="material-symbols-outlined text-purple-400">electric_bolt</span>
                    </div>
                    <p class="text-text-secondary-dark text-sm font-medium">Sewa Aktif</p>
                    <p class="text-2xl font-bold text-purple-400 mt-2"><?= number_format($stats['active_rentals']) ?></p>
                </div>

                <!-- Total Categories -->
                <div class="bg-component-background-dark p-6 rounded-xl border border-component-background-dark text-center hover:border-success/30 transition-all duration-300">
                    <div class="w-12 h-12 bg-success/10 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <span class="material-symbols-outlined text-success">category</span>
                    </div>
                    <p class="text-text-secondary-dark text-sm font-medium">Total Kategori</p>
                    <p class="text-2xl font-bold text-success mt-2"><?= number_format($stats['total_categories']) ?></p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Recent Transactions -->
                <div class="bg-component-background-dark p-6 rounded-xl border border-component-background-dark">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-text-primary-dark">Transaksi Terbaru</h2>
                        <a href="<?= base_url('/admin/transaksi') ?>" class="text-primary hover:text-primary/80 text-sm font-medium flex items-center">
                            Lihat Semua
                            <span class="material-symbols-outlined ml-1 text-sm">chevron_right</span>
                        </a>
                    </div>

                    <div class="space-y-4">
                        <?php if (!empty($recentTransactions)): ?>
                            <?php foreach ($recentTransactions as $transaction): ?>
                                <div class="flex items-center justify-between p-4 bg-background-dark rounded-lg border border-component-background-dark hover:border-primary/30 transition-all duration-300">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary text-sm">receipt</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-text-primary-dark"><?= esc($transaction['kode_transaksi']) ?></p>
                                            <p class="text-text-secondary-dark text-sm"><?= esc($transaction['nama_user'] ?? 'User') ?></p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-text-primary-dark">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></p>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $transaction['status_pembayaran'] == 'paid' ? 'bg-success/10 text-success' : 'bg-warning/10 text-warning' ?>">
                                            <?= $transaction['status_pembayaran'] == 'paid' ? 'Lunas' : 'Pending' ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center py-8">
                                <span class="material-symbols-outlined text-text-secondary-dark text-4xl mb-3">receipt_long</span>
                                <p class="text-text-secondary-dark">Belum ada transaksi</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Low Stock Products -->
                <div class="bg-component-background-dark p-6 rounded-xl border border-component-background-dark">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-text-primary-dark">Stok Menipis</h2>
                        <a href="<?= base_url('/admin/produk') ?>" class="text-primary hover:text-primary/80 text-sm font-medium flex items-center">
                            Kelola Produk
                            <span class="material-symbols-outlined ml-1 text-sm">chevron_right</span>
                        </a>
                    </div>

                    <div class="space-y-4">
                        <?php if (!empty($lowStockProducts)): ?>
                            <?php foreach ($lowStockProducts as $product): ?>
                                <div class="flex items-center justify-between p-4 bg-warning/5 rounded-lg border border-warning/20 hover:border-warning/30 transition-all duration-300">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-warning/10 rounded-lg flex items-center justify-center">
                                            <span class="material-symbols-outlined text-warning text-sm">warning</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-text-primary-dark"><?= esc($product['nama_produk']) ?></p>
                                            <p class="text-text-secondary-dark text-sm">Stok: <?= $product['stok'] ?></p>
                                        </div>
                                    </div>
                                    <span class="bg-warning/10 text-warning px-2.5 py-0.5 rounded-full text-xs font-medium">
                                        Stok Rendah
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center py-8">
                                <span class="material-symbols-outlined text-success text-4xl mb-3">check_circle</span>
                                <p class="text-text-secondary-dark">Semua stok aman</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-component-background-dark p-6 rounded-xl border border-component-background-dark">
                <h2 class="text-lg font-semibold text-text-primary-dark mb-6">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="<?= base_url('/admin/transaksi') ?>" class="quick-action-card group">
                        <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-500/20 transition-colors">
                            <span class="material-symbols-outlined text-blue-400">receipt_long</span>
                        </div>
                        <p class="font-semibold text-text-primary-dark mb-2">Kelola Transaksi</p>
                        <p class="text-text-secondary-dark text-sm">Lihat dan kelola semua transaksi</p>
                    </a>

                    <a href="<?= base_url('/admin/produk') ?>" class="quick-action-card group">
                        <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-500/20 transition-colors">
                            <span class="material-symbols-outlined text-green-400">inventory_2</span>
                        </div>
                        <p class="font-semibold text-text-primary-dark mb-2">Kelola Produk</p>
                        <p class="text-text-secondary-dark text-sm">Tambah dan edit produk</p>
                    </a>

                    <a href="<?= base_url('/admin/users') ?>" class="quick-action-card group">
                        <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-500/20 transition-colors">
                            <span class="material-symbols-outlined text-purple-400">group</span>
                        </div>
                        <p class="font-semibold text-text-primary-dark mb-2">Kelola Users</p>
                        <p class="text-text-secondary-dark text-sm">Kelola pengguna sistem</p>
                    </a>

                    <a href="<?= base_url('/') ?>" class="quick-action-card group">
                        <div class="w-12 h-12 bg-gray-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-gray-500/20 transition-colors">
                            <span class="material-symbols-outlined text-gray-400">public</span>
                        </div>
                        <p class="font-semibold text-text-primary-dark mb-2">Lihat Website</p>
                        <p class="text-text-secondary-dark text-sm">Kunjungi situs utama</p>
                    </a>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>