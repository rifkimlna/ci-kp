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
                        warning: "#FBBF24"
                    },
                    fontFamily: {
                        display: ["Space Grotesk", "sans-serif"],
                    }
                },
            },
        };
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
        }
        .status-badge {
            @apply inline-flex items-center px-3 py-1 rounded-full text-sm font-medium;
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
                    <span class="material-symbols-outlined text-white text-sm">receipt_long</span>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-text-primary-dark">Sewa Kamera</h1>
                    <p class="text-text-secondary-dark text-sm">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="<?= base_url('/admin') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined mr-3">dashboard</span>
                Dashboard
            </a>
            <a href="<?= base_url('/admin/transaksi') ?>" class="flex items-center px-4 py-3 bg-primary/20 text-primary rounded-xl font-semibold border border-primary/30">
                <span class="material-symbols-outlined mr-3">receipt_long</span>
                Transaksi
            </a>
            <a href="<?= base_url('/admin/produk') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined mr-3">inventory_2</span>
                Produk
            </a>
            <a href="<?= base_url('/') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined mr-3">public</span>
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
                <span class="material-symbols-outlined mr-3">logout</span>
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
                    <h1 class="text-2xl font-bold text-text-primary-dark">Kelola Transaksi</h1>
                    <p class="text-text-secondary-dark">Kelola dan konfirmasi semua transaksi penyewaan</p>
                </div>
                <div class="bg-background-dark px-4 py-2 rounded-xl border border-component-background-dark">
                    <p class="text-text-primary-dark text-sm font-medium"><?= date('l, d F Y') ?></p>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto p-8">
            <!-- Alert Messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-success/10 border border-success/20 text-success px-6 py-4 rounded-xl mb-6 flex items-center">
                    <span class="material-symbols-outlined mr-2">check_circle</span>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-error/10 border border-error/20 text-error px-6 py-4 rounded-xl mb-6 flex items-center">
                    <span class="material-symbols-outlined mr-2">error</span>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <!-- Filter Section -->
            <div class="bg-component-background-dark p-6 rounded-xl border border-component-background-dark mb-6">
                <h2 class="text-lg font-semibold text-text-primary-dark mb-4">Filter Transaksi</h2>
                <div class="flex flex-wrap gap-6">
                    <!-- Status Filter -->
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-text-secondary-dark mb-2">Status Transaksi</label>
                        <select onchange="window.location.href=this.value" 
                                class="w-full px-4 py-3 bg-background-dark border border-component-background-dark rounded-xl text-text-primary-dark focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
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
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-text-secondary-dark mb-2">Status Pembayaran</label>
                        <select onchange="window.location.href=this.value" 
                                class="w-full px-4 py-3 bg-background-dark border border-component-background-dark rounded-xl text-text-primary-dark focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
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
                        <a href="<?= base_url('/admin/transaksi') ?>" 
                           class="bg-background-dark hover:bg-background-dark/80 text-text-primary-dark px-6 py-3 rounded-xl font-semibold border border-component-background-dark transition-all duration-300 flex items-center">
                            <span class="material-symbols-outlined mr-2 text-sm">refresh</span>
                            Reset Filter
                        </a>
                    </div>
                </div>
            </div>

            <!-- Transactions Table -->
            <div class="bg-component-background-dark rounded-xl border border-component-background-dark overflow-hidden">
                <?php if (!empty($transactions)): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-background-dark/50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-text-secondary-dark uppercase tracking-wider">Kode</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-text-secondary-dark uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-text-secondary-dark uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-text-secondary-dark uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-text-secondary-dark uppercase tracking-wider">Pembayaran</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-text-secondary-dark uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-text-secondary-dark uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-background-dark">
                                <?php foreach ($transactions as $transaction): ?>
                                    <tr class="hover:bg-background-dark/30 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-primary"><?= esc($transaction['kode_transaksi']) ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-text-primary-dark"><?= esc($transaction['nama_user']) ?></div>
                                            <div class="text-sm text-text-secondary-dark"><?= esc($transaction['email_user']) ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-text-primary-dark">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php
                                            $statusColor = match($transaction['status_transaksi']) {
                                                'menunggu_konfirmasi' => 'bg-yellow-500/10 text-yellow-400',
                                                'dikonfirmasi' => 'bg-blue-500/10 text-blue-400',
                                                'diproses' => 'bg-purple-500/10 text-purple-400',
                                                'dikirim' => 'bg-indigo-500/10 text-indigo-400',
                                                'selesai' => 'bg-success/10 text-success',
                                                'dibatalkan' => 'bg-error/10 text-error',
                                                default => 'bg-gray-500/10 text-gray-400'
                                            };
                                            ?>
                                            <span class="status-badge <?= $statusColor ?>">
                                                <?= $status_labels[$transaction['status_transaksi']] ?? $transaction['status_transaksi'] ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php
                                            $paymentColor = match($transaction['status_pembayaran']) {
                                                'pending' => 'bg-yellow-500/10 text-yellow-400',
                                                'paid' => 'bg-success/10 text-success',
                                                'failed' => 'bg-error/10 text-error',
                                                'refunded' => 'bg-gray-500/10 text-gray-400',
                                                default => 'bg-gray-500/10 text-gray-400'
                                            };
                                            ?>
                                            <span class="status-badge <?= $paymentColor ?>">
                                                <?= $payment_labels[$transaction['status_pembayaran']] ?? $transaction['status_pembayaran'] ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary-dark">
                                            <?= date('d M Y', strtotime($transaction['created_at'])) ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-3">
                                                <a href="<?= base_url('/admin/transaksi/detail/' . $transaction['id']) ?>"
                                                   class="bg-primary/10 hover:bg-primary/20 text-primary px-4 py-2 rounded-lg text-sm font-semibold transition-colors flex items-center">
                                                    <span class="material-symbols-outlined mr-1 text-sm">visibility</span>
                                                    Detail
                                                </a>

                                                <?php if ($transaction['status_pembayaran'] == 'pending'): ?>
                                                    <form method="post" action="<?= base_url('/admin/transaksi/konfirmasi/' . $transaction['id']) ?>"
                                                          onsubmit="return confirm('Konfirmasi pembayaran ini?')">
                                                        <button type="submit" 
                                                                class="bg-success/10 hover:bg-success/20 text-success px-4 py-2 rounded-lg text-sm font-semibold transition-colors flex items-center">
                                                            <span class="material-symbols-outlined mr-1 text-sm">check_circle</span>
                                                            Konfirmasi
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
                        <div class="text-text-secondary-dark mb-4">
                            <span class="material-symbols-outlined text-6xl">receipt_long</span>
                        </div>
                        <p class="text-text-secondary-dark text-lg mb-4">Belum ada transaksi</p>
                        <p class="text-text-secondary-dark text-sm">Transaksi akan muncul di sini ketika customer melakukan penyewaan</p>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</div>

<script>
    // Auto hide messages
    setTimeout(() => {
        const successMessage = document.querySelector('.bg-success\\/10');
        const errorMessage = document.querySelector('.bg-error\\/10');
        if (successMessage) successMessage.remove();
        if (errorMessage) errorMessage.remove();
    }, 5000);
</script>
</body>
</html>