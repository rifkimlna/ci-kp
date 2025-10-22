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
                    <h1 class="text-2xl font-bold text-gray-900">Detail Transaksi</h1>
                    <p class="text-gray-600">Kode: <?= esc($transaction['kode_transaksi']) ?></p>
                </div>
                <div>
                    <a href="<?= base_url('/admin/transaksi') ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-semibold transition duration-300">
                        ← Kembali
                    </a>
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

            <?php if (!empty($transaction)): ?>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Transaction Info -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Customer Info -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-lg font-semibold mb-4">Informasi Customer</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Nama</p>
                                    <p class="font-medium"><?= esc($transaction['nama_user']) ?></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Email</p>
                                    <p class="font-medium"><?= esc($transaction['email']) ?></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Telepon</p>
                                    <p class="font-medium"><?= esc($transaction['telepon']) ?></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Alamat</p>
                                    <p class="font-medium"><?= esc($transaction['alamat']) ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Products -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-lg font-semibold mb-4">Item yang Disewa</h2>
                            <?php if (!empty($transaction['details'])): ?>
                                <div class="space-y-4">
                                    <?php foreach ($transaction['details'] as $detail): ?>
                                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                                            <img src="<?= base_url('uploads/products/' . esc($detail['gambar'])) ?>"
                                                 alt="<?= esc($detail['nama_produk']) ?>"
                                                 class="w-16 h-16 rounded object-cover"
                                                 onerror="this.src='https://placehold.co/100x100/F0EFEF/A0522D?text=Product'">
                                            <div class="flex-1">
                                                <h3 class="font-semibold text-gray-900"><?= esc($detail['nama_produk']) ?></h3>
                                                <div class="flex flex-wrap gap-4 text-sm text-gray-600 mt-1">
                                                    <span>Jumlah: <?= $detail['jumlah'] ?> unit</span>
                                                    <span>Harga: Rp <?= number_format($detail['harga_per_hari'], 0, ',', '.') ?>/hari</span>
                                                    <span>Subtotal: Rp <?= number_format($detail['subtotal'], 0, ',', '.') ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-gray-500 text-center py-4">Tidak ada detail transaksi</p>
                            <?php endif; ?>
                        </div>

                        <!-- Rental Period -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-lg font-semibold mb-4">Periode Sewa</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="text-center p-4 bg-blue-50 rounded-lg">
                                    <div class="text-2xl font-bold text-blue-600"><?= date('d', strtotime($transaction['tanggal_sewa'])) ?></div>
                                    <div class="text-sm text-blue-800"><?= date('M Y', strtotime($transaction['tanggal_sewa'])) ?></div>
                                    <div class="text-xs text-blue-600 mt-1">Tanggal Sewa</div>
                                </div>
                                <div class="text-center p-4 bg-green-50 rounded-lg">
                                    <div class="text-2xl font-bold text-green-600"><?= $transaction['lama_sewa'] ?></div>
                                    <div class="text-sm text-green-800">Hari</div>
                                    <div class="text-xs text-green-600 mt-1">Lama Sewa</div>
                                </div>
                                <div class="text-center p-4 bg-purple-50 rounded-lg">
                                    <div class="text-2xl font-bold text-purple-600"><?= date('d', strtotime($transaction['tanggal_kembali'])) ?></div>
                                    <div class="text-sm text-purple-800"><?= date('M Y', strtotime($transaction['tanggal_kembali'])) ?></div>
                                    <div class="text-xs text-purple-600 mt-1">Tanggal Kembali</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions & Summary -->
                    <div class="space-y-6">
                        <!-- Status & Actions -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-lg font-semibold mb-4">Status & Aksi</h2>

                            <!-- Current Status -->
                            <div class="mb-4">
                                <p class="text-sm text-gray-600">Status Transaksi</p>
                                <span class="status-badge status-<?= $transaction['status_transaksi'] ?> text-base">
                                    <?= $status_labels[$transaction['status_transaksi']] ?>
                                </span>
                            </div>

                            <div class="mb-4">
                                <p class="text-sm text-gray-600">Status Pembayaran</p>
                                <span class="status-badge status-<?= $transaction['status_pembayaran'] ?> text-base">
                                    <?= $payment_labels[$transaction['status_pembayaran']] ?>
                                </span>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <?php if ($transaction['status_pembayaran'] == 'pending'): ?>
                                    <form method="post" action="<?= base_url('/admin/transaksi/konfirmasi/' . $transaction['id']) ?>">
                                        <button type="submit"
                                                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-300"
                                                onclick="return confirm('Konfirmasi pembayaran ini?')">
                                            Konfirmasi Pembayaran
                                        </button>
                                    </form>
                                <?php endif; ?>

                                <!-- Update Status Form -->
                                <form method="post" action="<?= base_url('/admin/transaksi/update-status/' . $transaction['id']) ?>">
                                    <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-2 focus:outline-none focus:border-primary">
                                        <option value="menunggu_konfirmasi" <?= $transaction['status_transaksi'] == 'menunggu_konfirmasi' ? 'selected' : '' ?>>Menunggu Konfirmasi</option>
                                        <option value="dikonfirmasi" <?= $transaction['status_transaksi'] == 'dikonfirmasi' ? 'selected' : '' ?>>Terkonfirmasi</option>
                                        <option value="diproses" <?= $transaction['status_transaksi'] == 'diproses' ? 'selected' : '' ?>>Diproses</option>
                                        <option value="dikirim" <?= $transaction['status_transaksi'] == 'dikirim' ? 'selected' : '' ?>>Dikirim</option>
                                        <option value="selesai" <?= $transaction['status_transaksi'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                                    </select>
                                    <button type="submit" class="w-full bg-primary hover:bg-opacity-90 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-300">
                                        Update Status
                                    </button>
                                </form>

                                <!-- Cancel Button -->
                                <form method="post" action="<?= base_url('/admin/transaksi/batalkan/' . $transaction['id']) ?>">
                                    <button type="submit"
                                            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-300"
                                            onclick="return confirm('Yakin ingin membatalkan transaksi ini? Stok akan dikembalikan.')">
                                        Batalkan Transaksi
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Payment Summary -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-lg font-semibold mb-4">Ringkasan Pembayaran</h2>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal:</span>
                                    <span class="font-semibold">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Lama Sewa:</span>
                                    <span class="font-semibold"><?= $transaction['lama_sewa'] ?> hari</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Metode Bayar:</span>
                                    <span class="font-semibold"><?= ucfirst(str_replace('_', ' ', $transaction['metode_pembayaran'])) ?></span>
                                </div>
                                <div class="border-t pt-3">
                                    <div class="flex justify-between text-lg font-bold">
                                        <span>Total:</span>
                                        <span class="text-primary">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-16">
                    <p class="text-gray-500 text-lg">Transaksi tidak ditemukan.</p>
                    <a href="<?= base_url('/admin/transaksi') ?>" class="text-primary hover:text-opacity-80 font-semibold mt-4 inline-block">
                        Kembali ke Daftar Transaksi
                    </a>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

</body>
</html>