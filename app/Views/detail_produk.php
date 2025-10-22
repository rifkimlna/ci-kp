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

<!-- Navigation (sama seperti sebelumnya) -->
<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100/50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="<?= base_url('/') ?>" class="text-3xl font-extrabold tracking-tighter text-text-dark transition duration-300">
                <span class="text-primary font-bold">PRO</span>RENTAL
            </a>
            <div class="hidden lg:flex space-x-10 text-lg font-medium">
                <a href="<?= base_url('/katalog') ?>" class="text-gray-600 hover:text-primary transition duration-300">Katalog</a>
                <a href="<?= base_url('/') ?>#keunggulan" class="text-gray-600 hover:text-primary transition duration-300">Fitur Premium</a>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Auth buttons sama seperti sebelumnya -->
            </div>
        </div>
    </div>
</nav>

<!-- Product Detail -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (!empty($product)): ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Product Image -->
                <div>
                    <img src="<?= base_url('uploads/products/' . esc($product['gambar'])) ?>"
                         alt="<?= esc($product['nama_produk']) ?>"
                         class="w-full rounded-3xl shadow-lg"
                         onerror="this.src='https://placehold.co/600x400/F0EFEF/A0522D?text=<?= urlencode($product['nama_produk']) ?>'">
                </div>

                <!-- Product Info -->
                <div class="flex flex-col justify-center">
                    <span class="text-sm text-primary font-semibold mb-2"><?= esc($product['kategori']) ?></span>
                    <h1 class="text-4xl font-bold mb-4 text-gray-900"><?= esc($product['nama_produk']) ?></h1>
                    <p class="text-gray-600 mb-6 text-lg"><?= esc($product['deskripsi']) ?></p>

                    <?php if (!empty($product['spesifikasi'])): ?>
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold mb-3 text-gray-900">Spesifikasi:</h3>
                            <p class="text-gray-600"><?= nl2br(esc($product['spesifikasi'])) ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="mb-6">
                        <p class="text-4xl font-extrabold text-primary mb-2">
                            Rp <?= number_format($product['harga_per_hari'], 0, ',', '.') ?>
                            <span class="text-sm font-normal text-gray-400">/ hari</span>
                        </p>
                        <p class="text-sm <?= $product['stok'] > 0 ? 'text-green-600' : 'text-red-600' ?> font-semibold">
                            <?= $product['stok'] > 0 ? 'Stok Tersedia: ' . $product['stok'] . ' unit' : 'Stok Habis' ?>
                        </p>
                    </div>

                    <?php if ($product['stok'] > 0): ?>
                        <a href="<?= base_url('/sewa/' . $product['id']) ?>"
                           class="bg-primary hover:bg-opacity-90 text-white text-center font-bold py-4 px-8 rounded-full text-lg transition duration-300 transform hover:scale-105">
                            Sewa Sekarang
                        </a>
                    <?php else: ?>
                        <button class="bg-gray-400 cursor-not-allowed text-white text-center font-bold py-4 px-8 rounded-full text-lg">
                            Stok Habis
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">Produk tidak ditemukan.</p>
                <a href="<?= base_url('/katalog') ?>" class="text-primary hover:text-opacity-80 font-semibold mt-4 inline-block">
                    Kembali ke Katalog
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Footer (sama seperti sebelumnya) -->
<footer class="bg-light-bg py-12 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600">
        <p class="text-base">&copy; <?= date('Y') ?> PRORENTAL. Semua Hak Dilindungi.</p>
    </div>
</footer>

</body>
</html>