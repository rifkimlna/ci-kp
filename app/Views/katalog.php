<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> - PRORENTAL</title>
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
        .character-limiter {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-light-bg text-text-dark font-sans antialiased">

<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100/50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo/Brand Name -->
            <a href="<?= base_url('/') ?>" class="text-3xl font-extrabold tracking-tighter text-text-dark transition duration-300">
                <span class="text-primary font-bold">PRO</span>RENTAL
            </a>

            <!-- Navigation Links -->
            <div class="hidden lg:flex space-x-10 text-lg font-medium">
                <a href="<?= base_url('/katalog') ?>" class="text-primary font-semibold transition duration-300">Katalog</a>
                <a href="<?= base_url('/') ?>#keunggulan" class="text-gray-600 hover:text-primary transition duration-300">Fitur Premium</a>
                <a href="<?= base_url('/') ?>#cara-sewa" class="text-gray-600 hover:text-primary transition duration-300">Proses Sewa</a>
                <a href="<?= base_url('/') ?>#testimoni" class="text-gray-600 hover:text-primary transition duration-300">Klien</a>
            </div>

            <!-- Auth Buttons (Right) -->
            <div class="flex items-center space-x-4">
                <?php if (!session()->get('isLoggedIn')): ?>
                    <!-- User belum login -->
                    <a href="<?= base_url('/auth/login') ?>" class="text-primary hover:text-text-dark font-semibold transition duration-300 hidden md:block">
                        Login
                    </a>
                    <a href="<?= base_url('/auth/register') ?>" class="bg-primary hover:bg-opacity-90 text-white font-bold py-2.5 px-7 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
                        Daftar
                    </a>
                <?php else: ?>
                    <!-- User sudah login -->
                    <span class="text-gray-700 font-medium hidden md:block">Halo, <?= esc(session()->get('nama')) ?></span>
                    <a href="<?= base_url('/riwayat') ?>" class="text-gray-600 hover:text-primary font-medium transition duration-300 hidden md:block">
                        Riwayat Sewa
                    </a>
                    <?php if (session()->get('role') === 'admin'): ?>
                        <a href="<?= base_url('/admin/dashboard') ?>" class="text-gray-600 hover:text-primary font-medium transition duration-300 hidden md:block">
                            Admin
                        </a>
                    <?php endif; ?>
                    <a href="<?= base_url('/auth/logout') ?>" class="bg-primary hover:bg-opacity-90 text-white font-bold py-2.5 px-7 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
                        Logout
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<!-- Header Katalog -->
<section class="pt-32 pb-20 bg-light-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl sm:text-6xl font-extrabold mb-6 text-gray-900">
            Katalog <span class="text-primary">Lengkap</span>
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Temukan peralatan kamera dan lensa profesional untuk mendukung kreativitas Anda
        </p>
    </div>
</section>

<!-- Filter & Produk -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Filter Section -->
        <div class="mb-12 p-6 bg-light-section rounded-2xl shadow-sm">
            <div class="flex flex-col md:flex-row gap-6 items-center justify-between">
                <div class="flex flex-wrap gap-2">
                    <a href="<?= base_url('/katalog') ?>"
                       class="<?= empty($current_category) ? 'bg-primary text-white' : 'bg-white text-gray-600 border border-gray-200' ?> px-6 py-2 rounded-full font-semibold hover:border-primary transition duration-300">
                        Semua
                    </a>
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <a href="<?= base_url('/katalog?kategori=' . $category['id']) ?>"
                               class="<?= $current_category == $category['id'] ? 'bg-primary text-white' : 'bg-white text-gray-600 border border-gray-200' ?> px-6 py-2 rounded-full font-semibold hover:border-primary transition duration-300">
                                <?= esc($category['nama_kategori']) ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Search Form -->
                <form method="get" action="<?= base_url('/katalog') ?>" class="flex gap-2">
                    <input type="text"
                           name="search"
                           value="<?= esc($search_keyword) ?>"
                           placeholder="Cari produk..."
                           class="bg-white border border-gray-200 rounded-full px-4 py-2 focus:outline-none focus:border-primary w-64">
                    <button type="submit" class="bg-primary hover:bg-opacity-90 text-white px-6 py-2 rounded-full font-semibold transition duration-300">
                        Cari
                    </button>
                    <?php if (!empty($search_keyword) || !empty($current_category)): ?>
                        <a href="<?= base_url('/katalog') ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-full font-semibold transition duration-300">
                            Reset
                        </a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <!-- Grid Produk -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="bg-white rounded-3xl p-6 shadow-xl shadow-gray-200 border border-gray-100 hover:shadow-2xl hover:shadow-primary/10 transition duration-300">
                        <img src="<?= base_url('uploads/products/' . esc($product['gambar'])) ?>"
                             alt="<?= esc($product['nama_produk']) ?>"
                             class="rounded-2xl w-full mb-5 aspect-video object-cover"
                             onerror="this.src='https://placehold.co/600x400/F0EFEF/A0522D?text=<?= urlencode($product['nama_produk']) ?>'">
                        <h3 class="text-2xl font-bold mb-1 text-gray-900"><?= esc($product['nama_produk']) ?></h3>
                        <p class="text-base text-gray-500 mb-4 character-limiter"><?= esc($product['deskripsi']) ?></p>
                        <p class="text-3xl font-extrabold text-primary mb-5">
                            Rp <?= number_format($product['harga_per_hari'], 0, ',', '.') ?>
                            <span class="text-sm font-normal text-gray-400">/ hari</span>
                        </p>

                        <!-- Stok & Kategori -->
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-sm <?= $product['stok'] > 0 ? 'text-green-600' : 'text-red-600' ?> font-semibold">
                                <?= $product['stok'] > 0 ? 'Stok: ' . $product['stok'] : 'Stok Habis' ?>
                            </span>
                            <?php if (isset($product['kategori'])): ?>
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">
                                    <?= esc($product['kategori']) ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <?php if ($product['stok'] > 0): ?>
                            <a href="<?= base_url('sewa/' . $product['id']) ?>"
                               class="block w-full text-center bg-primary hover:bg-opacity-90 text-white font-semibold py-3 rounded-full transition duration-300">
                                Sewa Sekarang
                            </a>
                        <?php else: ?>
                            <button class="block w-full text-center bg-gray-400 cursor-not-allowed text-white font-semibold py-3 rounded-full">
                                Stok Habis
                            </button>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-3 text-center py-16">
                    <div class="text-gray-400 mb-4">
                        <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-8V4a1 1 0 00-1-1h-2a1 1 0 00-1 1v1M9 7h6"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg mb-4">Belum ada produk tersedia.</p>
                    <a href="<?= base_url('/') ?>" class="text-primary hover:text-opacity-80 font-semibold">
                        Kembali ke Beranda
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination (placeholder) -->
        <div class="mt-16 flex justify-center">
            <div class="flex gap-2">
                <button class="bg-primary text-white w-10 h-10 rounded-full font-semibold">1</button>
                <button class="bg-white text-gray-600 w-10 h-10 rounded-full font-semibold border border-gray-200 hover:border-primary">2</button>
                <button class="bg-white text-gray-600 w-10 h-10 rounded-full font-semibold border border-gray-200 hover:border-primary">3</button>
                <button class="bg-white text-gray-600 w-10 h-10 rounded-full font-semibold border border-gray-200 hover:border-primary">→</button>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-primary/5">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-extrabold mb-6 text-gray-900">
            Butuh Bantuan Memilih?
        </h2>
        <p class="text-xl text-gray-600 mb-8">
            Tim ahli kami siap membantu Anda memilih peralatan yang tepat untuk kebutuhan produksi
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6281234567890" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                Chat WhatsApp
            </a>
            <a href="tel:+6281234567890" class="bg-primary hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-full transition duration-300">
                Telepon Kami
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-light-bg py-12 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600">
        <p class="text-base">&copy; <?= date('Y') ?> PRORENTAL. Semua Hak Dilindungi. <span class="text-primary">CI</span>, Indonesia.</p>
        <div class="mt-6 space-x-8 text-sm font-medium">
            <a href="#" class="hover:text-primary transition duration-300">Syarat & Ketentuan</a>
            <a href="#" class="hover:text-primary transition duration-300">Lokasi Kami</a>
            <a href="#" class="hover:text-primary transition duration-300">FAQ</a>
            <a href="#" class="hover:text-primary transition duration-300">Bantuan</a>
        </div>
    </div>
</footer>

</body>
</html>