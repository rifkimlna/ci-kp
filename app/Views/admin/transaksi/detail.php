<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#000000',
                        secondary: '#666666',
                        light: '#f8f9fa',
                        border: '#e5e7eb'
                    },
                    fontFamily: {
                        display: ['Inter', 'sans-serif'],
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
            @apply px-3 py-1 rounded-full text-xs font-semibold border;
        }
        .status-pending { @apply bg-yellow-50 text-yellow-800 border-yellow-200; }
        .status-paid { @apply bg-green-50 text-green-800 border-green-200; }
        .status-failed { @apply bg-red-50 text-red-800 border-red-200; }
        .status-menunggu_konfirmasi { @apply bg-yellow-50 text-yellow-800 border-yellow-200; }
        .status-dikonfirmasi { @apply bg-blue-50 text-blue-800 border-blue-200; }
        .status-diproses { @apply bg-purple-50 text-purple-800 border-purple-200; }
        .status-dikirim { @apply bg-indigo-50 text-indigo-800 border-indigo-200; }
        .status-selesai { @apply bg-green-50 text-green-800 border-green-200; }
        .status-dibatalkan { @apply bg-red-50 text-red-800 border-red-200; }
    </style>
</head>
<body class="bg-gray-50 font-display text-gray-900">
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-lg border-r border-gray-200">
        <div class="p-6">
            <a href="<?= base_url('/admin') ?>" class="text-2xl font-bold text-gray-900">
                <span class="text-black font-black">PRO</span>RENTAL
            </a>
            <p class="text-gray-600 text-sm mt-1">Admin Panel</p>
        </div>

        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="<?= base_url('/admin') ?>" class="flex items-center px-4 py-3 text-gray-600 hover:text-black hover:bg-gray-50 rounded-xl transition-all duration-300 border border-transparent hover:border-gray-200">
                    <span class="material-symbols-outlined mr-3">dashboard</span>
                    Dashboard
                </a>
                <a href="<?= base_url('/admin/transaksi') ?>" class="flex items-center px-4 py-3 bg-gray-100 text-black rounded-xl font-semibold border border-gray-300">
                    <span class="material-symbols-outlined mr-3">receipt_long</span>
                    Transaksi
                </a>
                <a href="<?= base_url('/') ?>" class="flex items-center px-4 py-3 text-gray-600 hover:text-black hover:bg-gray-50 rounded-xl transition-all duration-300 border border-transparent hover:border-gray-200">
                    <span class="material-symbols-outlined mr-3">public</span>
                    Kembali ke Site
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex justify-between items-center px-8 py-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Detail Transaksi</h1>
                    <p class="text-gray-600">Kode: <?= esc($transaction['kode_transaksi']) ?></p>
                </div>
                <div>
                    <a href="<?= base_url('/admin/transaksi') ?>" class="bg-white hover:bg-gray-50 text-gray-900 px-6 py-3 rounded-xl font-semibold border border-gray-300 transition-all duration-300 flex items-center">
                        <span class="material-symbols-outlined mr-2">arrow_back</span>
                        Kembali
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-8">
            <!-- Alert Messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-6 flex items-center">
                    <span class="material-symbols-outlined mr-2">check_circle</span>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-xl mb-6 flex items-center">
                    <span class="material-symbols-outlined mr-2">error</span>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($transaction)): ?>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Transaction Info -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Customer Info -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Customer</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Nama</p>
                                    <p class="font-medium text-gray-900"><?= esc($transaction['nama_user']) ?></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Email</p>
                                    <p class="font-medium text-gray-900"><?= esc($transaction['email']) ?></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Telepon</p>
                                    <p class="font-medium text-gray-900"><?= esc($transaction['telepon']) ?></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Alamat</p>
                                    <p class="font-medium text-gray-900"><?= esc($transaction['alamat']) ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Products -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Item yang Disewa</h2>
                            <?php if (!empty($transaction['details'])): ?>
                                <div class="space-y-4">
                                    <?php foreach ($transaction['details'] as $detail): ?>
                                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                            <img src="<?= base_url('uploads/products/' . esc($detail['gambar'])) ?>"
                                                 alt="<?= esc($detail['nama_produk']) ?>"
                                                 class="w-16 h-16 rounded object-cover"
                                                 onerror="this.src='https://placehold.co/100x100/f3f4f6/6b7280?text=Product'">
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
                        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Periode Sewa</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="text-center p-4 bg-blue-50 rounded-xl border border-blue-200">
                                    <div class="text-2xl font-bold text-blue-900"><?= date('d', strtotime($transaction['tanggal_sewa'])) ?></div>
                                    <div class="text-sm text-blue-700"><?= date('M Y', strtotime($transaction['tanggal_sewa'])) ?></div>
                                    <div class="text-xs text-blue-600 mt-1">Tanggal Sewa</div>
                                </div>
                                <div class="text-center p-4 bg-green-50 rounded-xl border border-green-200">
                                    <div class="text-2xl font-bold text-green-900"><?= $transaction['lama_sewa'] ?></div>
                                    <div class="text-sm text-green-700">Hari</div>
                                    <div class="text-xs text-green-600 mt-1">Lama Sewa</div>
                                </div>
                                <div class="text-center p-4 bg-purple-50 rounded-xl border border-purple-200">
                                    <div class="text-2xl font-bold text-purple-900"><?= date('d', strtotime($transaction['tanggal_kembali'])) ?></div>
                                    <div class="text-sm text-purple-700"><?= date('M Y', strtotime($transaction['tanggal_kembali'])) ?></div>
                                    <div class="text-xs text-purple-600 mt-1">Tanggal Kembali</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions & Summary -->
                    <div class="space-y-6">
                        <!-- Status & Actions -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Status & Aksi</h2>

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
                                                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 px-4 rounded-xl transition-all duration-300"
                                                onclick="return confirm('Konfirmasi pembayaran ini?')">
                                            Konfirmasi Pembayaran
                                        </button>
                                    </form>
                                <?php endif; ?>

                                <!-- Update Status Form -->
                                <form method="post" action="<?= base_url('/admin/transaksi/update-status/' . $transaction['id']) ?>">
                                    <select name="status" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 mb-3 focus:border-black focus:ring-1 focus:ring-black transition-colors">
                                        <option value="menunggu_konfirmasi" <?= $transaction['status_transaksi'] == 'menunggu_konfirmasi' ? 'selected' : '' ?>>Menunggu Konfirmasi</option>
                                        <option value="dikonfirmasi" <?= $transaction['status_transaksi'] == 'dikonfirmasi' ? 'selected' : '' ?>>Terkonfirmasi</option>
                                        <option value="diproses" <?= $transaction['status_transaksi'] == 'diproses' ? 'selected' : '' ?>>Diproses</option>
                                        <option value="dikirim" <?= $transaction['status_transaksi'] == 'dikirim' ? 'selected' : '' ?>>Dikirim</option>
                                        <option value="selesai" <?= $transaction['status_transaksi'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                                    </select>
                                    <button type="submit" class="w-full bg-black hover:bg-gray-800 text-white font-semibold py-2.5 px-4 rounded-xl transition-all duration-300">
                                        Update Status
                                    </button>
                                </form>

                                <!-- Cancel Button -->
                                <form method="post" action="<?= base_url('/admin/transaksi/batalkan/' . $transaction['id']) ?>">
                                    <button type="submit"
                                            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 px-4 rounded-xl transition-all duration-300"
                                            onclick="return confirm('Yakin ingin membatalkan transaksi ini? Stok akan dikembalikan.')">
                                        Batalkan Transaksi
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Payment Summary -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan Pembayaran</h2>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal:</span>
                                    <span class="font-semibold text-gray-900">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Lama Sewa:</span>
                                    <span class="font-semibold text-gray-900"><?= $transaction['lama_sewa'] ?> hari</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Metode Bayar:</span>
                                    <span class="font-semibold text-gray-900"><?= ucfirst(str_replace('_', ' ', $transaction['metode_pembayaran'])) ?></span>
                                </div>
                                <div class="border-t border-gray-200 pt-3">
                                    <div class="flex justify-between text-lg font-bold">
                                        <span class="text-gray-900">Total:</span>
                                        <span class="text-black">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-16">
                    <div class="text-gray-400 mb-4">
                        <span class="material-symbols-outlined text-6xl">receipt_long</span>
                    </div>
                    <p class="text-gray-500 text-lg mb-4">Transaksi tidak ditemukan.</p>
                    <a href="<?= base_url('/admin/transaksi') ?>" class="text-black hover:text-gray-700 font-semibold mt-4 inline-block">
                        Kembali ke Daftar Transaksi
                    </a>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<script>
    // Auto hide messages
    setTimeout(() => {
        const successMessage = document.querySelector('.bg-green-50');
        const errorMessage = document.querySelector('.bg-red-50');
        if (successMessage) successMessage.remove();
        if (errorMessage) errorMessage.remove();
    }, 5000);
</script>
</body>
</html>