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
    </style>
</head>
<body class="bg-light-bg text-text-dark font-sans antialiased">

<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100/50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="<?= base_url('/') ?>" class="text-3xl font-extrabold tracking-tighter text-text-dark transition duration-300">
                <span class="text-primary font-bold">PRO</span>RENTAL
            </a>
        </div>
    </div>
</nav>

<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Pesanan Berhasil Dibuat!</h1>
            <p class="text-gray-600 mt-2">Silakan lakukan pembayaran untuk mengkonfirmasi pesanan Anda</p>
        </div>

        <?php if (!empty($transaction)): ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Order Details -->
                <div class="bg-light-section p-6 rounded-2xl shadow-sm">
                    <h2 class="text-xl font-bold mb-4">Detail Pesanan</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Kode Transaksi:</span>
                            <span class="font-semibold"><?= esc($transaction['kode_transaksi']) ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tanggal Pesan:</span>
                            <span class="font-semibold"><?= date('d/m/Y H:i', strtotime($transaction['created_at'])) ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span class="font-semibold text-yellow-600">Menunggu Pembayaran</span>
                        </div>
                    </div>

                    <?php if (!empty($transaction['details'])): ?>
                        <div class="mt-6">
                            <h3 class="font-semibold mb-3">Item yang Disewa:</h3>
                            <?php foreach ($transaction['details'] as $detail): ?>
                                <div class="flex items-center space-x-3 p-3 bg-white rounded-lg">
                                    <img src="<?= base_url('uploads/products/' . esc($detail['gambar'])) ?>"
                                         alt="<?= esc($detail['nama_produk']) ?>"
                                         class="w-12 h-12 rounded object-cover"
                                         onerror="this.src='https://placehold.co/100x100/F0EFEF/A0522D?text=Product'">
                                    <div class="flex-1">
                                        <p class="font-medium"><?= esc($detail['nama_produk']) ?></p>
                                        <p class="text-sm text-gray-500"><?= $detail['jumlah'] ?> unit × Rp <?= number_format($detail['harga'], 0, ',', '.') ?>/hari</p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Payment Info -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-xl font-bold mb-4">Informasi Pembayaran</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between text-lg">
                            <span>Total Pembayaran:</span>
                            <span class="font-bold text-primary text-xl">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></span>
                        </div>

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <h3 class="font-semibold text-yellow-800 mb-2">Instruksi Pembayaran:</h3>
                            <p class="text-yellow-700 text-sm">
                                <?php if ($transaction['metode_pembayaran'] == 'transfer_bank'): ?>
                                    Silakan transfer ke rekening BCA 1234567890 a.n. PRORENTAL
                                <?php elseif ($transaction['metode_pembayaran'] == 'qris'): ?>
                                    Scan QR code yang akan dikirim via WhatsApp
                                <?php else: ?>
                                    Bayar saat barang diterima
                                <?php endif; ?>
                            </p>
                        </div>

                        <div class="flex space-x-3">
                            <a href="<?= base_url('/riwayat') ?>" class="flex-1 bg-gray-500 hover:bg-opacity-70 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300">
                                Riwayat Sewa
                            </a>
                            <a href="<?= base_url('/katalog') ?>"
                               class="flex-1 bg-primary hover:bg-opacity-90 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300">
                                Sewa Lagi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

</body>
</html>