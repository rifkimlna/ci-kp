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
                <a href="<?= base_url('/riwayat') ?>" class="text-gray-600 hover:text-primary transition duration-300">
                    ← Kembali ke Riwayat
                </a>
            </div>
        </div>
    </div>
</nav>

<section class="py-8 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (!empty($transaction)): ?>
            <!-- Header -->
            <div class="bg-light-section p-6 rounded-2xl shadow-sm mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Detail Transaksi</h1>
                        <p class="text-gray-600 mt-1"><?= esc($transaction['kode_transaksi']) ?></p>
                    </div>
                    <div class="flex space-x-2 mt-4 md:mt-0">
                        <span class="status-badge status-<?= $transaction['status_pembayaran'] ?>">
                            Pembayaran: <?= ucfirst($transaction['status_pembayaran']) ?>
                        </span>
                        <span class="status-badge status-<?= $transaction['status_transaksi'] ?>">
                            Status: <?= str_replace('_', ' ', ucfirst($transaction['status_transaksi'])) ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Order Details -->
                <div class="lg:col-span-2 space-y-6">
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
                                                <span>Harga: Rp <?= number_format($detail['harga'], 0, ',', '.') ?>/hari</span>
                                                <span>Subtotal: Rp <?= number_format($detail['subtotal'], 0, ',', '.') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
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

                <!-- Summary -->
                <div class="space-y-6">
                    <!-- Payment Info -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h2 class="text-lg font-semibold mb-4">Informasi Pembayaran</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Metode Pembayaran:</span>
                                <span class="font-semibold"><?= ucfirst(str_replace('_', ' ', $transaction['metode_pembayaran'])) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Lama Sewa:</span>
                                <span class="font-semibold"><?= $transaction['lama_sewa'] ?> hari</span>
                            </div>
                            <div class="border-t pt-3">
                                <div class="flex justify-between text-lg font-bold">
                                    <span>Total:</span>
                                    <span class="text-primary">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></span>
                                </div>
                            </div>
                        </div>

                        <?php if ($transaction['status_pembayaran'] == 'pending'): ?>
                            <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <p class="text-yellow-800 text-sm">
                                    <strong>Silakan lakukan pembayaran:</strong><br>
                                    Transfer ke BCA 1234567890 a.n. PRORENTAL
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Actions -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h2 class="text-lg font-semibold mb-4">Aksi</h2>
                        <div class="space-y-3">
                            <a href="<?= base_url('/riwayat') ?>"
                               class="w-full bg-gray-500 hover:bg-gray-600 text-white text-center font-semibold py-2.5 px-4 rounded-lg transition duration-300 block">
                                Kembali ke Riwayat
                            </a>

                            <?php if ($transaction['status_pembayaran'] == 'pending'): ?>
                                <form method="post" action="<?= base_url('/riwayat/batalkan/' . $transaction['id']) ?>"
                                      onsubmit="return confirm('Yakin ingin membatalkan transaksi ini?')">
                                    <?= csrf_field() ?>
                                    <button type="submit"
                                            class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-300">
                                        Batalkan Transaksi
                                    </button>
                                </form>
                            <?php endif; ?>

                            <a href="<?= base_url('/katalog') ?>"
                               class="w-full bg-primary hover:bg-opacity-90 text-white text-center font-semibold py-2.5 px-4 rounded-lg transition duration-300 block">
                                Sewa Lagi
                            </a>
                        </div>
                    </div>


                    <!-- Timeline -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h2 class="text-lg font-semibold mb-6">Status Pesanan</h2>
                        <div class="space-y-6">
                            <!-- Timeline Item 1: Pesanan Dibuat -->
                            <div class="flex items-start">
                                <div class="flex flex-col items-center mr-4">
                                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div class="w-0.5 h-12 bg-green-200 mt-2"></div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Pesanan Dibuat</p>
                                    <p class="text-xs text-gray-500 mb-1">Pesanan Anda telah berhasil dibuat dan menunggu proses pembayaran</p>
                                    <p class="text-xs text-gray-400"><?= date('d M Y H:i', strtotime($transaction['created_at'])) ?></p>
                                </div>
                            </div>

                            <!-- Timeline Item 2: Pembayaran -->
                            <div class="flex items-start">
                                <div class="flex flex-col items-center mr-4">
                                    <div class="w-8 h-8 <?= $transaction['status_pembayaran'] == 'paid' ? 'bg-green-500' : ($transaction['status_pembayaran'] == 'pending' ? 'bg-yellow-400' : 'bg-gray-300') ?> rounded-full flex items-center justify-center">
                                        <?php if ($transaction['status_pembayaran'] == 'paid'): ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        <?php elseif ($transaction['status_pembayaran'] == 'pending'): ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        <?php else: ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                    <div class="w-0.5 h-12 <?= in_array($transaction['status_transaksi'], ['dikonfirmasi', 'diproses', 'dikirim', 'selesai']) ? 'bg-green-200' : 'bg-gray-200' ?> mt-2"></div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">
                                        <?php if ($transaction['status_pembayaran'] == 'paid'): ?>
                                            Pembayaran Diterima
                                        <?php elseif ($transaction['status_pembayaran'] == 'pending'): ?>
                                            Menunggu Pembayaran
                                        <?php else: ?>
                                            Pembayaran Gagal
                                        <?php endif; ?>
                                    </p>
                                    <p class="text-xs text-gray-500 mb-1">
                                        <?php if ($transaction['status_pembayaran'] == 'paid'): ?>
                                            Pembayaran Anda telah dikonfirmasi dan pesanan sedang diproses
                                        <?php elseif ($transaction['status_pembayaran'] == 'pending'): ?>
                                            Silakan lakukan pembayaran untuk melanjutkan proses pesanan
                                        <?php else: ?>
                                            Pembayaran tidak berhasil, silakan hubungi customer service
                                        <?php endif; ?>
                                    </p>
                                    <?php if ($transaction['status_pembayaran'] == 'paid' && !empty($transaction['updated_at'])): ?>
                                        <p class="text-xs text-gray-400"><?= date('d M Y H:i', strtotime($transaction['updated_at'])) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Timeline Item 3: Konfirmasi Admin -->
                            <div class="flex items-start">
                                <div class="flex flex-col items-center mr-4">
                                    <div class="w-8 h-8 <?= in_array($transaction['status_transaksi'], ['dikonfirmasi', 'diproses', 'dikirim', 'selesai']) ? 'bg-green-500' : ($transaction['status_transaksi'] == 'menunggu_konfirmasi' ? 'bg-yellow-400' : 'bg-gray-300') ?> rounded-full flex items-center justify-center">
                                        <?php if (in_array($transaction['status_transaksi'], ['dikonfirmasi', 'diproses', 'dikirim', 'selesai'])): ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        <?php else: ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                    <div class="w-0.5 h-12 <?= in_array($transaction['status_transaksi'], ['diproses', 'dikirim', 'selesai']) ? 'bg-green-200' : 'bg-gray-200' ?> mt-2"></div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">
                                        <?php if (in_array($transaction['status_transaksi'], ['dikonfirmasi', 'diproses', 'dikirim', 'selesai'])): ?>
                                            Pesanan Dikonfirmasi
                                        <?php else: ?>
                                            Menunggu Konfirmasi
                                        <?php endif; ?>
                                    </p>
                                    <p class="text-xs text-gray-500 mb-1">
                                        <?php if (in_array($transaction['status_transaksi'], ['dikonfirmasi', 'diproses', 'dikirim', 'selesai'])): ?>
                                            Pesanan telah dikonfirmasi oleh admin dan sedang disiapkan
                                        <?php else: ?>
                                            Pesanan menunggu konfirmasi dari admin
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Timeline Item 4: Diproses -->
                            <div class="flex items-start">
                                <div class="flex flex-col items-center mr-4">
                                    <div class="w-8 h-8 <?= in_array($transaction['status_transaksi'], ['diproses', 'dikirim', 'selesai']) ? 'bg-green-500' : 'bg-gray-300' ?> rounded-full flex items-center justify-center">
                                        <?php if (in_array($transaction['status_transaksi'], ['diproses', 'dikirim', 'selesai'])): ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        <?php else: ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                    <div class="w-0.5 h-12 <?= in_array($transaction['status_transaksi'], ['dikirim', 'selesai']) ? 'bg-green-200' : 'bg-gray-200' ?> mt-2"></div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Pesanan Diproses</p>
                                    <p class="text-xs text-gray-500 mb-1">
                                        <?php if (in_array($transaction['status_transaksi'], ['diproses', 'dikirim', 'selesai'])): ?>
                                            Barang sedang dipersiapkan dan dilakukan pengecekan kualitas
                                        <?php else: ?>
                                            Pesanan akan diproses setelah konfirmasi
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Timeline Item 5: Dikirim -->
                            <div class="flex items-start">
                                <div class="flex flex-col items-center mr-4">
                                    <div class="w-8 h-8 <?= in_array($transaction['status_transaksi'], ['dikirim', 'selesai']) ? 'bg-green-500' : 'bg-gray-300' ?> rounded-full flex items-center justify-center">
                                        <?php if (in_array($transaction['status_transaksi'], ['dikirim', 'selesai'])): ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        <?php else: ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                    <div class="w-0.5 h-12 <?= $transaction['status_transaksi'] == 'selesai' ? 'bg-green-200' : 'bg-gray-200' ?> mt-2"></div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Pesanan Dikirim</p>
                                    <p class="text-xs text-gray-500 mb-1">
                                        <?php if (in_array($transaction['status_transaksi'], ['dikirim', 'selesai'])): ?>
                                            Barang sedang dalam perjalanan menuju alamat Anda
                                        <?php else: ?>
                                            Barang akan dikirim setelah proses persiapan selesai
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Timeline Item 6: Selesai -->
                            <div class="flex items-start">
                                <div class="flex flex-col items-center mr-4">
                                    <div class="w-8 h-8 <?= $transaction['status_transaksi'] == 'selesai' ? 'bg-green-500' : 'bg-gray-300' ?> rounded-full flex items-center justify-center">
                                        <?php if ($transaction['status_transaksi'] == 'selesai'): ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        <?php else: ?>
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Pesanan Selesai</p>
                                    <p class="text-xs text-gray-500 mb-1">
                                        <?php if ($transaction['status_transaksi'] == 'selesai'): ?>
                                            Pesanan telah sampai dan proses sewa telah dimulai
                                        <?php else: ?>
                                            Menunggu pesanan sampai dan konfirmasi penerimaan
                                        <?php endif; ?>
                                    </p>
                                    <?php if ($transaction['status_transaksi'] == 'selesai' && !empty($transaction['updated_at'])): ?>
                                        <p class="text-xs text-gray-400"><?= date('d M Y H:i', strtotime($transaction['updated_at'])) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Summary Status -->
                        <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-semibold text-blue-800">Status Saat Ini</p>
                                    <p class="text-sm text-blue-600">
                                        <?php
                                        $status_messages = [
                                            'menunggu_konfirmasi' => 'Pesanan menunggu konfirmasi pembayaran',
                                            'dikonfirmasi' => 'Pesanan telah dikonfirmasi dan sedang dipersiapkan',
                                            'diproses' => 'Pesanan sedang diproses',
                                            'dikirim' => 'Pesanan sedang dikirim',
                                            'selesai' => 'Pesanan telah selesai',
                                            'dibatalkan' => 'Pesanan telah dibatalkan'
                                        ];
                                        echo $status_messages[$transaction['status_transaksi']] ?? 'Status tidak diketahui';
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">Transaksi tidak ditemukan.</p>
                <a href="<?= base_url('/riwayat') ?>" class="text-primary hover:text-opacity-80 font-semibold mt-4 inline-block">
                    Kembali ke Riwayat
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

</body>
</html>