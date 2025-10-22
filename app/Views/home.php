<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Kamera Pro - Ciptakan Konten Terbaik</title>
    <!-- Load Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Konfigurasi Tailwind untuk warna dan font (Putih & Coklat) -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#A0522D', // Sienna/Warm Brown untuk kesan premium
                        'light-bg': '#ffffff', // Latar belakang utama putih bersih
                        'light-section': '#FCF8F5', // Creamy off-white untuk kedalaman section yang mewah
                        'text-dark': '#2C1F1D', // Dark Brown/Espresso untuk teks
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        /* Mengatur font Inter dari Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

        /* Custom helper untuk character limiter */
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

            <!-- Navigation Links (Middle) -->
            <div class="hidden lg:flex space-x-10 text-lg font-medium">
                <a href="<?= base_url('/katalog') ?>" class="text-gray-600 hover:text-primary transition duration-300">Katalog</a>
                <a href="#keunggulan" class="text-gray-600 hover:text-primary transition duration-300">Fitur Premium</a>
                <a href="#cara-sewa" class="text-gray-600 hover:text-primary transition duration-300">Proses Sewa</a>
                <a href="#testimoni" class="text-gray-600 hover:text-primary transition duration-300">Klien</a>
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

<header class="pt-24 pb-36 md:pt-40 md:pb-52 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between">
        <!-- Text Content -->
        <div class="md:w-1/2 text-center md:text-left">
            <p class="text-lg font-medium text-primary mb-3 uppercase tracking-widest">PRODUKSI TANPA BATAS</p>
            <h1 class="text-6xl sm:text-8xl lg:text-9xl font-extrabold mb-6 leading-none text-gray-900">
                Gear <span class="text-primary">Eksklusif.</span>
            </h1>
            <h2 class="text-3xl sm:text-4xl font-light mb-10 leading-snug text-gray-700 max-w-lg mx-auto md:mx-0">
                Sewa kamera dan lensa sinematik terbaik, kini lebih mudah.
            </h2>
            <!-- Main CTA Button -->
            <a href="<?= base_url('/katalog') ?>" class="inline-block bg-primary hover:bg-opacity-90 text-white font-bold text-xl py-4 px-12 rounded-full shadow-2xl transition duration-300 transform hover:scale-[1.02] ring-4 ring-primary/50">
                Jelajahi Koleksi &rarr;
            </a>

            <!-- Trust Badges -->
            <div class="mt-16 flex justify-center md:justify-start items-center space-x-6">
                <p class="text-sm font-semibold text-gray-700 border-r pr-6 border-gray-300">⭐️ Rating 4.9/5.0</p>
                <p class="text-sm font-semibold text-gray-700">1000+ Proyek Terlaksana</p>
            </div>
        </div>

        <!-- Image Placeholder -->
        <div class="md:w-1/2 mt-16 md:mt-0 flex justify-center">
            <div class="bg-light-section p-8 rounded-[40px] shadow-2xl shadow-gray-300/50 border-4 border-gray-100">
                <?php if(isset($featured_products[0])): ?>
                    <img src="<?= base_url('uploads/products/' . esc($featured_products[0]['gambar'])) ?>"
                         alt="<?= esc($featured_products[0]['nama_produk']) ?>"
                         class="rounded-2xl object-cover w-full h-80"
                         onerror="this.src='https://placehold.co/550x380/F0EFEF/A0522D?text=Kamera+Sinematik+4K'">
                <?php else: ?>
                    <img src="https://placehold.co/550x380/F0EFEF/A0522D?text=Kamera+Sinematik+4K"
                         alt="Ilustrasi Kamera Profesional"
                         class="rounded-2xl object-cover w-full h-80">
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<section id="keunggulan" class="py-28 bg-light-section border-t border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-center mb-20 text-gray-900">
            Keunggulan <span class="text-primary">Layanan Kami</span>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12">

            <!-- Card 1: Kualitas Terjamin -->
            <div class="p-4 text-center">
                <div class="text-primary mb-4 w-14 h-14 mx-auto opacity-80">
                    <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0015.586 3H7a2 2 0 00-2 2v11m0 5l4-4m-4 4l4-4m-4 4H4m4-4V4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-1 text-gray-900">Kualitas Terjamin</h3>
                <p class="text-gray-600 text-sm">Semua kamera dan lensa rutin dicek & diservis, siap untuk produksi profesional.</p>
            </div>

            <!-- Card 2: Proteksi & Asuransi -->
            <div class="p-4 text-center">
                <div class="text-primary mb-4 w-14 h-14 mx-auto opacity-80">
                    <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.001 12.001 0 002 15c0 1.54 0 3.08 0 4.588C2.083 20.301 2.923 21 4 21h16c1.077 0 1.917-.699 2-1.412 0-1.508 0-3.048 0-4.588a12.001 12.001 0 00-2.382-7.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-1 text-gray-900">Proteksi & Asuransi</h3>
                <p class="text-gray-600 text-sm">Unit dilindungi asuransi, sehingga penyewaan lebih aman dan nyaman.</p>
            </div>

            <!-- Card 3: Konfirmasi Cepat -->
            <div class="p-4 text-center">
                <div class="text-primary mb-4 w-14 h-14 mx-auto opacity-80">
                    <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-1 text-gray-900">Konfirmasi Cepat</h3>
                <p class="text-gray-600 text-sm">Booking online efisien, konfirmasi transaksi langsung dalam hitungan menit.</p>
            </div>

            <!-- Card 4: Dukungan 24/7 -->
            <div class="p-4 text-center">
                <div class="text-primary mb-4 w-14 h-14 mx-auto opacity-80">
                    <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m-7.071 7.071l3.536-3.536M7.071 16.929a4 4 0 00.513 3.684A4 4 0 009.684 21c1.173 0 2.223-.513 2.951-1.332m3.671-5.655a4 4 0 00-3.684-.513A4 4 0 0013 16.929m0 0l-3.536 3.536M4.929 7.071l3.536 3.536m7.071 7.071l-3.536-3.536M12 21v-4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-1 text-gray-900">Dukungan 24/7</h3>
                <p class="text-gray-600 text-sm">Tim support siap membantu kapan saja, untuk kelancaran proyek Anda.</p>
            </div>

        </div>
    </div>
</section>

<section id="katalog" class="py-28 bg-light-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-center mb-16 text-gray-900">
            Koleksi <span class="text-primary">Eksklusif</span> Kami
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <?php if (!empty($featured_products)): ?>
                <?php foreach ($featured_products as $product): ?>
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

                        <!-- Stok Indicator -->
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
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 text-lg">Belum ada produk tersedia.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-20">
            <a href="<?= base_url('/katalog') ?>" class="text-xl font-bold text-primary hover:text-opacity-80 transition duration-300 border-b-2 border-primary/50 hover:border-primary/80 pb-1">
                Lihat Semua Peralatan &rarr;
            </a>
        </div>
    </div>
</section>

<!-- Section Testimoni -->
<section id="testimoni" class="py-28 bg-white border-t border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-center mb-16 text-gray-900">
            Kata <span class="text-primary">Klien Kami</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimoni 1 -->
            <div class="bg-light-section p-8 rounded-3xl shadow-lg border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-lg">
                        A
                    </div>
                    <div class="ml-4">
                        <h4 class="font-bold text-gray-900">Andi Wijaya</h4>
                        <div class="flex text-yellow-400">
                            ★★★★★
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic">"Pelayanan sangat cepat dan kamera dalam kondisi prima. Hasil shooting untuk project iklan client sangat memuaskan!"</p>
            </div>

            <!-- Testimoni 2 -->
            <div class="bg-light-section p-8 rounded-3xl shadow-lg border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-lg">
                        S
                    </div>
                    <div class="ml-4">
                        <h4 class="font-bold text-gray-900">Sarah Photography</h4>
                        <div class="flex text-yellow-400">
                            ★★★★★
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic">"Lensa yang disewa sangat tajam, proses sewa mudah, dan tim support sangat helpful. Recommended banget!"</p>
            </div>

            <!-- Testimoni 3 -->
            <div class="bg-light-section p-8 rounded-3xl shadow-lg border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-lg">
                        R
                    </div>
                    <div class="ml-4">
                        <h4 class="font-bold text-gray-900">Rendra Production</h4>
                        <div class="flex text-yellow-400">
                            ★★★★★
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic">"Sudah beberapa kali sewa lighting equipment di sini. Kualitas terjamin dan harga kompetitif. Bakal repeat order terus!"</p>
            </div>
        </div>
    </div>
</section>

<section id="cara-sewa" class="py-28 bg-light-section border-t border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-center mb-16 text-gray-900">
            3 Langkah <span class="text-primary">Sewa Kamera</span>
        </h2>

        <div class="flex flex-col md:flex-row justify-center items-stretch gap-10 md:gap-20">
            <!-- Step 1: Pilih & Reservasi -->
            <div class="text-center max-w-xs p-6 bg-white rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                <div class="w-14 h-14 mx-auto bg-primary text-white flex items-center justify-center rounded-full text-2xl font-extrabold mb-4 shadow-md">1</div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Pilih & Reservasi</h3>
                <p class="text-gray-600">Pilih kamera/lensa, tentukan tanggal sewa, dan lakukan deposit online dengan cepat.</p>
            </div>

            <!-- Step 2: Verifikasi Cepat -->
            <div class="text-center max-w-xs p-6 bg-white rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                <div class="w-14 h-14 mx-auto bg-primary text-white flex items-center justify-center rounded-full text-2xl font-extrabold mb-4 shadow-md">2</div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Verifikasi Cepat</h3>
                <p class="text-gray-600">Verifikasi identitas Anda via KTP atau dokumen resmi. Aman & instan.</p>
            </div>

            <!-- Step 3: Ambil atau Dikirim -->
            <div class="text-center max-w-xs p-6 bg-white rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                <div class="w-14 h-14 mx-auto bg-primary text-white flex items-center justify-center rounded-full text-2xl font-extrabold mb-4 shadow-md">3</div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Ambil atau Dikirim</h3>
                <p class="text-gray-600">Ambil unit di studio kami atau gunakan layanan kirim. Siap produksi tanpa ribet!</p>
            </div>
        </div>
    </div>
</section>

<!-- FINAL CTA BANNER -->
<section class="py-24 bg-primary/5 border-t border-b border-primary/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl sm:text-6xl font-extrabold mb-4 text-gray-900">
            Tingkatkan <span class="text-primary">Produksi Anda</span>
        </h2>
        <p class="text-xl text-gray-700 mb-12 max-w-4xl mx-auto">
            Sewa kamera & lensa profesional tanpa harus membeli. Solusi mudah, cepat, dan aman untuk semua proyek Anda.
        </p>
        <a href="<?= base_url('/katalog') ?>" class="inline-block bg-primary hover:bg-opacity-90 text-white font-bold text-xl py-4 px-12 rounded-full shadow-2xl transition duration-300 transform hover:scale-105 ring-4 ring-primary/50">
            Sewa Sekarang &rarr;
        </a>
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