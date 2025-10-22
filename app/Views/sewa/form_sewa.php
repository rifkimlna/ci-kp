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
            <a href="<?= base_url('/katalog') ?>" class="text-gray-600 hover:text-primary transition duration-300">
                ← Kembali ke Katalog
            </a>
        </div>
    </div>
</nav>

<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Form Penyewaan</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Product Summary -->
            <div class="bg-light-section p-6 rounded-2xl shadow-sm">
                <h2 class="text-xl font-bold mb-4">Ringkasan Produk</h2>
                <?php if (!empty($product)): ?>
                    <div class="flex items-center space-x-4 mb-4">
                        <img src="<?= base_url('uploads/products/' . esc($product['gambar'])) ?>"
                             alt="<?= esc($product['nama_produk']) ?>"
                             class="w-20 h-20 rounded-lg object-cover"
                             onerror="this.src='https://placehold.co/100x100/F0EFEF/A0522D?text=<?= urlencode($product['nama_produk']) ?>'">
                        <div>
                            <h3 class="font-semibold"><?= esc($product['nama_produk']) ?></h3>
                            <p class="text-primary font-bold">Rp <?= number_format($product['harga_per_hari'], 0, ',', '.') ?> / hari</p>
                            <p class="text-sm text-green-600">Stok: <?= $product['stok'] ?> unit</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Booking Form -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold mb-4">Detail Penyewaan</h2>
                <form method="post" action="<?= base_url('/sewa/process') ?>">
                    <?= csrf_field() ?>

                    <input type="hidden" name="produk_id" value="<?= $product['id'] ?>">

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Sewa</label>
                            <input type="date" name="tanggal_sewa"
                                   min="<?= date('Y-m-d') ?>"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali"
                                   min="<?= date('Y-m-d', strtotime('+1 day')) ?>"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Unit</label>
                            <input type="number" name="jumlah"
                                   min="1" max="<?= $product['stok'] ?>"
                                   value="1"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"
                                   required>
                            <p class="text-xs text-gray-500 mt-1">Maksimal: <?= $product['stok'] ?> unit</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Metode Pembayaran</label>
                            <select name="metode_pembayaran" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>
                                <option value="">Pilih Metode</option>
                                <option value="transfer_bank">Transfer Bank</option>
                                <option value="qris">QRIS</option>
                                <option value="cod">Cash on Delivery</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                            <textarea name="catatan" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"
                                      placeholder="Catatan tambahan untuk penyewaan..."></textarea>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="w-full bg-primary hover:bg-opacity-90 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                            Lanjutkan ke Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    // Auto calculate return date minimum
    document.querySelector('input[name="tanggal_sewa"]').addEventListener('change', function() {
        const sewaDate = new Date(this.value);
        const kembaliDate = new Date(sewaDate);
        kembaliDate.setDate(kembaliDate.getDate() + 1);

        const minKembali = kembaliDate.toISOString().split('T')[0];
        document.querySelector('input[name="tanggal_kembali"]').min = minKembali;

        // If current return date is before new min date, reset it
        const currentKembali = document.querySelector('input[name="tanggal_kembali"]').value;
        if (currentKembali && new Date(currentKembali) < kembaliDate) {
            document.querySelector('input[name="tanggal_kembali"]').value = minKembali;
        }
    });
</script>

</body>
</html>