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
        .status-paid { @apply bg-blue-100 text-blue-800; }
        .status-diproses { @apply bg-purple-100 text-purple-800; }
        .status-dikirim { @apply bg-indigo-100 text-indigo-800; }
        .status-selesai { @apply bg-green-100 text-green-800; }
        .status-dibatalkan { @apply bg-red-100 text-red-800; }
    </style>
</head>
<body class="bg-light-bg text-text-dark font-sans antialiased">

<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100/50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="<?= base_url('/') ?>" class="text-3xl font-extrabold tracking-tighter text-text-dark transition duration-300">
                <span class="text-primary font-bold">PRO</span>RENTAL
            </a>
            <div class="flex items-center space-x-4">
                <a href="<?= base_url('/katalog') ?>" class="text-gray-600 hover:text-primary transition duration-300">
                    Katalog
                </a>
                <span class="text-gray-700 font-medium">Halo, <?= esc(session()->get('nama')) ?></span>
                <a href="<?= base_url('/auth/logout') ?>" class="bg-primary hover:bg-opacity-90 text-white font-bold py-2.5 px-7 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
                    Logout
                </a>
            </div>
        </div>
    </div>
</nav>

<section class="py-8 bg-light-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Riwayat Transaksi</h1>
                <p class="text-gray-600 mt-2">Kelola dan pantau semua penyewaan Anda</p>
            </div>
            <a href="<?= base_url('/katalog') ?>" class="bg-primary hover:bg-opacity-90 text-white font-semibold py-2.5 px-6 rounded-full transition duration-300 mt-4 md:mt-0">
                Sewa Lagi
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-2xl font-bold text-gray-900"><?= $stats['total'] ?></div>
                <div class="text-sm text-gray-500">Total Transaksi</div>
            </div>
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-2xl font-bold text-yellow-600"><?= $stats['pending'] ?></div>
                <div class="text-sm text-gray-500">Menunggu Bayar</div>
            </div>
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-2xl font-bold text-blue-600"><?= $stats['paid'] ?></div>
                <div class="text-sm text-gray-500">Sudah Dibayar</div>
            </div>
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-2xl font-bold text-green-600"><?= $stats['selesai'] ?></div>
                <div class="text-sm text-gray-500">Selesai</div>
            </div>
        </div>

        <!-- Filter Tabs -->
<!--        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-6">-->
<!--            <div class="flex flex-wrap gap-2 p-4">-->
<!--                <a href="--><?php //= base_url('/riwayat') ?><!--"-->
<!--                   class="--><?php //= empty($current_filter) ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700' ?><!-- px-4 py-2 rounded-full font-semibold text-sm transition duration-300">-->
<!--                    Semua-->
<!--                </a>-->
<!--                <a href="--><?php //= base_url('/riwayat?filter=pending') ?><!--"-->
<!--                   class="--><?php //= $current_filter == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-700' ?><!-- px-4 py-2 rounded-full font-semibold text-sm transition duration-300">-->
<!--                    Menunggu Bayar-->
<!--                </a>-->
<!--                <a href="--><?php //= base_url('/riwayat?filter=paid') ?><!--"-->
<!--                   class="--><?php //= $current_filter == 'paid' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-700' ?><!-- px-4 py-2 rounded-full font-semibold text-sm transition duration-300">-->
<!--                    Sudah Dibayar-->
<!--                </a>-->
<!--                <a href="--><?php //= base_url('/riwayat?filter=diproses') ?><!--"-->
<!--                   class="--><?php //= $current_filter == 'diproses' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-700' ?><!-- px-4 py-2 rounded-full font-semibold text-sm transition duration-300">-->
<!--                    Diproses-->
<!--                </a>-->
<!--                <a href="--><?php //= base_url('/riwayat?filter=selesai') ?><!--"-->
<!--                   class="--><?php //= $current_filter == 'selesai' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700' ?><!-- px-4 py-2 rounded-full font-semibold text-sm transition duration-300">-->
<!--                    Selesai-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->

        <!-- Filter Tabs -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-6">
            <div class="flex flex-wrap gap-2 p-4">
                <a href="<?= base_url('/riwayat') ?>"
                   class="<?= empty($current_filter) ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Semua
                </a>
                <a href="<?= base_url('/riwayat?filter=pending') ?>"
                   class="<?= $current_filter == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-700' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Menunggu Bayar
                </a>
                <a href="<?= base_url('/riwayat?filter=paid') ?>"
                   class="<?= $current_filter == 'paid' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-700' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Sudah Dibayar
                </a>
                <a href="<?= base_url('/riwayat?filter=diproses') ?>"
                   class="<?= $current_filter == 'diproses' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-700' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Diproses
                </a>
                <a href="<?= base_url('/riwayat?filter=dikirim') ?>"
                   class="<?= $current_filter == 'dikirim' ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-700' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Dikirim
                </a>
                <a href="<?= base_url('/riwayat?filter=selesai') ?>"
                   class="<?= $current_filter == 'selesai' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700' ?> px-4 py-2 rounded-full font-semibold text-sm transition duration-300">
                    Selesai
                </a>
            </div>
        </div>

        <!-- Transactions List -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
            <?php if (!empty($transactions)): ?>
                <div class="divide-y divide-gray-100">
                    <?php foreach ($transactions as $transaction): ?>
                        <div class="p-6 hover:bg-gray-50 transition duration-300">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <div class="flex-1">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-3">
                                        <div>
                                            <span class="text-lg font-semibold text-gray-900">
                                                <?= esc($transaction['kode_transaksi']) ?>
                                            </span>
                                            <span class="status-badge status-<?= $transaction['status_pembayaran'] ?> ml-2">
                                                <?= ucfirst($transaction['status_pembayaran']) ?>
                                            </span>
                                            <span class="status-badge status-<?= $transaction['status_transaksi'] ?> ml-2">
                                                <?= str_replace('_', ' ', ucfirst($transaction['status_transaksi'])) ?>
                                            </span>
                                        </div>
                                        <div class="text-lg font-bold text-primary mt-2 sm:mt-0">
                                            Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?>
                                        </div>
                                    </div>

                                    <!-- Products List -->
                                    <?php if (!empty($transaction['details'])): ?>
                                        <div class="mb-3">
                                            <?php foreach ($transaction['details'] as $detail): ?>
                                                <div class="flex items-center space-x-3 text-sm text-gray-600 mb-2">
                                                    <img src="<?= base_url('uploads/products/' . esc($detail['gambar'])) ?>"
                                                         alt="<?= esc($detail['nama_produk']) ?>"
                                                         class="w-10 h-10 rounded object-cover"
                                                         onerror="this.src='https://placehold.co/100x100/F0EFEF/A0522D?text=Product'">
                                                    <span><?= esc($detail['nama_produk']) ?></span>
                                                    <span class="text-gray-400">•</span>
                                                    <span><?= $detail['jumlah'] ?> unit</span>
                                                    <span class="text-gray-400">•</span>
                                                    <span><?= $transaction['lama_sewa'] ?> hari</span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Sewa: <?= date('d M Y', strtotime($transaction['tanggal_sewa'])) ?>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Kembali: <?= date('d M Y', strtotime($transaction['tanggal_kembali'])) ?>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Dibuat: <?= date('d M Y H:i', strtotime($transaction['created_at'])) ?>
                                        </div>
                                    </div>

                                    <?php if (!empty($transaction['catatan'])): ?>
                                        <div class="mt-2 text-sm text-gray-600">
                                            <span class="font-medium">Catatan:</span> <?= esc($transaction['catatan']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="flex space-x-2 mt-4 lg:mt-0 lg:ml-4">
                                    <a href="<?= base_url('/riwayat/detail/' . $transaction['id']) ?>"
                                       class="bg-primary hover:bg-opacity-90 text-white px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
                                        Detail
                                    </a>

                                    <?php if ($transaction['status_pembayaran'] == 'pending'): ?>
                                        <form method="post" action="<?= base_url('/riwayat/batalkan/' . $transaction['id']) ?>"
                                              onsubmit="return confirm('Yakin ingin membatalkan transaksi ini?')">
                                            <?= csrf_field() ?>
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
                                                Batalkan
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-16">
                    <div class="text-gray-400 mb-4">
                        <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg mb-4">Belum ada transaksi</p>
                    <a href="<?= base_url('/katalog') ?>"
                       class="bg-primary hover:bg-opacity-90 text-white font-semibold py-2.5 px-6 rounded-full transition duration-300">
                        Mulai Sewa
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

</body>
</html>