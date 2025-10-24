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
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
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
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[1200px] flex-1">

<!-- Header dengan navigasi -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-component-background-dark px-4 md:px-10 py-3">
    <div class="flex items-center gap-4 text-text-primary-dark">
        <div class="size-6 text-primary">
            <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_6_535)">
                    <path clip-rule="evenodd" d="M47.2426 24L24 47.2426L0.757355 24L24 0.757355L47.2426 24ZM12.2426 21H35.7574L24 9.24264L12.2426 21Z" fill="currentColor" fill-rule="evenodd"></path>
                </g>
                <defs>
                    <clipPath id="clip0_6_535">
                        <rect fill="white" height="48" width="48"></rect>
                    </clipPath>
                </defs>
            </svg>
        </div>
        <h1 class="text-text-primary-dark text-xl font-bold leading-tight tracking-[-0.015em]">Sewa Kamera</h1>
    </div>
    <div class="hidden md:flex flex-1 justify-end items-center gap-8">
        <nav class="flex items-center gap-9">
            <a class="text-text-primary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= base_url('/') ?>">Home</a>
            <a class="text-text-primary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= base_url('/katalog') ?>">Kamera</a>
            <a class="text-text-primary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Tentang Kami</a>
            <a class="text-text-primary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Kontak</a>
        </nav>
        <span class="text-text-primary-dark font-medium">Halo, <?= esc(session()->get('nama')) ?></span>
        <a href="<?= base_url('/auth/logout') ?>" class="bg-primary hover:bg-opacity-90 text-white font-bold py-2.5 px-7 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
            Logout
        </a>
    </div>
</header>

<main class="flex-1 p-4 md:p-6 lg:p-10">
    <div class="w-full">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-text-primary-dark tracking-tight">Riwayat Transaksi</h1>
                <p class="text-text-secondary-dark mt-2">Kelola dan pantau semua penyewaan Anda</p>
            </div>
            <a href="<?= base_url('/katalog') ?>" class="bg-primary hover:bg-opacity-90 text-white font-semibold py-2.5 px-6 rounded-full transition duration-300 mt-4 md:mt-0">
                Sewa Lagi
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-component-background-dark p-4 rounded-2xl shadow-sm border border-component-background-dark">
                <div class="text-2xl font-bold text-text-primary-dark"><?= $stats['total'] ?></div>
                <div class="text-sm text-text-secondary-dark">Total Transaksi</div>
            </div>
            <div class="bg-component-background-dark p-4 rounded-2xl shadow-sm border border-component-background-dark">
                <div class="text-2xl font-bold text-warning"><?= $stats['pending'] ?></div>
                <div class="text-sm text-text-secondary-dark">Menunggu Bayar</div>
            </div>
            <div class="bg-component-background-dark p-4 rounded-2xl shadow-sm border border-component-background-dark">
                <div class="text-2xl font-bold text-primary"><?= $stats['paid'] ?></div>
                <div class="text-sm text-text-secondary-dark">Sudah Dibayar</div>
            </div>
            <div class="bg-component-background-dark p-4 rounded-2xl shadow-sm border border-component-background-dark">
                <div class="text-2xl font-bold text-success"><?= $stats['selesai'] ?></div>
                <div class="text-sm text-text-secondary-dark">Selesai</div>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="bg-component-background-dark rounded-2xl shadow-sm border border-component-background-dark mb-6">
            <div class="flex flex-wrap gap-2 p-4">
                <a href="<?= base_url('/riwayat') ?>"
                   class="<?= empty($current_filter) ? 'bg-primary text-white' : 'bg-background-dark text-text-secondary-dark' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Semua
                </a>
                <a href="<?= base_url('/riwayat?filter=pending') ?>"
                   class="<?= $current_filter == 'pending' ? 'bg-warning text-yellow-900' : 'bg-background-dark text-text-secondary-dark' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Menunggu Bayar
                </a>
                <a href="<?= base_url('/riwayat?filter=paid') ?>"
                   class="<?= $current_filter == 'paid' ? 'bg-primary text-blue-900' : 'bg-background-dark text-text-secondary-dark' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Sudah Dibayar
                </a>
                <a href="<?= base_url('/riwayat?filter=diproses') ?>"
                   class="<?= $current_filter == 'diproses' ? 'bg-purple-500 text-white' : 'bg-background-dark text-text-secondary-dark' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Diproses
                </a>
                <a href="<?= base_url('/riwayat?filter=dikirim') ?>"
                   class="<?= $current_filter == 'dikirim' ? 'bg-indigo-500 text-white' : 'bg-background-dark text-text-secondary-dark' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Dikirim
                </a>
                <a href="<?= base_url('/riwayat?filter=selesai') ?>"
                   class="<?= $current_filter == 'selesai' ? 'bg-success text-green-900' : 'bg-background-dark text-text-secondary-dark' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Selesai
                </a>
            </div>
        </div>

        <!-- Transactions List -->
        <div class="bg-component-background-dark rounded-2xl shadow-sm border border-component-background-dark">
            <?php if (!empty($transactions)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-background-dark/50">
                                <th class="p-4 text-text-secondary-dark font-semibold text-sm">No. Pesanan</th>
                                <th class="p-4 text-text-secondary-dark font-semibold text-sm">Tanggal Sewa</th>
                                <th class="p-4 text-text-secondary-dark font-semibold text-sm">Status Pembayaran</th>
                                <th class="p-4 text-text-secondary-dark font-semibold text-sm">Status Transaksi</th>
                                <th class="p-4 text-text-secondary-dark font-semibold text-sm text-right">Total Biaya</th>
                                <th class="p-4"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-background-dark">
                            <?php foreach ($transactions as $transaction): ?>
                                <tr class="hover:bg-background-dark/30 transition-colors cursor-pointer">
                                    <td class="p-4 text-primary font-medium whitespace-nowrap">
                                        <?= esc($transaction['kode_transaksi']) ?>
                                    </td>
                                    <td class="p-4 text-text-primary-dark whitespace-nowrap">
                                        <?= date('d M Y', strtotime($transaction['tanggal_sewa'])) ?>
                                    </td>
                                    <td class="p-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <?php
                                            $statusColor = match($transaction['status_pembayaran']) {
                                                'pending' => 'warning',
                                                'paid' => 'success',
                                                'dibatalkan' => 'error',
                                                default => 'text-secondary-dark'
                                            };
                                            ?>
                                            <span class="inline-block w-2.5 h-2.5 bg-<?= $statusColor ?> rounded-full"></span>
                                            <span class="text-<?= $statusColor ?>"><?= ucfirst($transaction['status_pembayaran']) ?></span>
                                        </div>
                                    </td>
                                    <td class="p-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <?php
                                            $statusTransaksiColor = match($transaction['status_transaksi']) {
                                                'diproses' => 'purple-500',
                                                'dikirim' => 'indigo-500',
                                                'selesai' => 'success',
                                                'dibatalkan' => 'error',
                                                default => 'text-secondary-dark'
                                            };
                                            ?>
                                            <span class="inline-block w-2.5 h-2.5 bg-<?= $statusTransaksiColor ?> rounded-full"></span>
                                            <span class="text-<?= $statusTransaksiColor ?>"><?= str_replace('_', ' ', ucfirst($transaction['status_transaksi'])) ?></span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-text-primary-dark font-semibold text-right whitespace-nowrap">
                                        Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?>
                                    </td>
                                    <td class="p-4 text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="<?= base_url('/riwayat/detail/' . $transaction['id']) ?>"
                                               class="bg-primary hover:bg-opacity-90 text-white px-3 py-1 rounded-lg text-sm font-semibold transition duration-300">
                                                Detail
                                            </a>
                                            <?php if ($transaction['status_pembayaran'] == 'pending'): ?>
                                                <form method="post" action="<?= base_url('/riwayat/batalkan/' . $transaction['id']) ?>"
                                                      onsubmit="return confirm('Yakin ingin membatalkan transaksi ini?')">
                                                    <?= csrf_field() ?>
                                                    <button type="submit"
                                                            class="bg-error hover:bg-opacity-90 text-white px-3 py-1 rounded-lg text-sm font-semibold transition duration-300">
                                                        Batalkan
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
                        <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <p class="text-text-secondary-dark text-lg mb-4">Belum ada transaksi</p>
                    <a href="<?= base_url('/katalog') ?>"
                       class="bg-primary hover:bg-opacity-90 text-white font-semibold py-2.5 px-6 rounded-full transition duration-300">
                        Mulai Sewa
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<footer class="text-center p-6 border-t border-solid border-component-background-dark mt-10">
    <p class="text-text-secondary-dark text-sm">© 2023 Sewa Kamera. All Rights Reserved.</p>
    <div class="flex justify-center gap-4 mt-2">
        <a class="text-text-secondary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Tentang Kami</a>
        <a class="text-text-secondary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">FAQ</a>
        <a class="text-text-secondary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Kontak</a>
    </div>
</footer>

</div>
</div>
</div>
</div>
</body>
</html>