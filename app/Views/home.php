<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Sewa Kamera Pro - Ciptakan Konten Terbaik</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#00BFFF",
                        "background-light": "#f6f7f8",
                        "background-dark": "#0A192F",
                        accent: "#64FFDA",
                        "text-primary": "#E6F1FF",
                        "text-secondary": "#8892B0",
                        "card-dark": "#12233f",
                    },
                    fontFamily: {
                        display: ["Space Grotesk", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                        lg: "0.75rem",
                        xl: "1rem",
                        full: "9999px",
                    },
                },
            },
        };
    </script>
    <style>
        .character-limiter {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-background-dark font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="flex flex-1 justify-center">
<div class="layout-content-container flex flex-col max-w-6xl flex-1">

<!-- Header/Navigation -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-card-dark/50 px-10 py-4 sticky top-0 bg-background-dark/80 backdrop-blur-sm z-10">
    <div class="flex items-center gap-4 text-text-primary">
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
        <h2 class="text-text-primary text-xl font-bold leading-tight tracking-[-0.015em]">PRO<span class="text-primary">RENTAL</span></h2>
    </div>
    <nav class="flex flex-1 justify-center gap-8">
        <a class="text-text-primary hover:text-accent text-sm font-medium leading-normal" href="<?= base_url('/') ?>">Beranda</a>
        <a class="text-text-secondary hover:text-accent text-sm font-medium leading-normal" href="<?= base_url('/katalog') ?>">Katalog</a>
        <a class="text-text-secondary hover:text-accent text-sm font-medium leading-normal" href="#keunggulan">Fitur Premium</a>
        <a class="text-text-secondary hover:text-accent text-sm font-medium leading-normal" href="#cara-sewa">Proses Sewa</a>
        <a class="text-text-secondary hover:text-accent text-sm font-medium leading-normal" href="#testimoni">Klien</a>
    </nav>
    <div class="flex gap-3">
        <?php if (!session()->get('isLoggedIn')): ?>
            <a href="<?= base_url('/auth/login') ?>" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-transparent border border-primary text-primary hover:bg-primary/20 text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Masuk</span>
            </a>
            <a href="<?= base_url('/auth/register') ?>" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] hover:bg-accent hover:text-background-dark transition-colors">
                <span class="truncate">Daftar</span>
            </a>
        <?php else: ?>
            <span class="flex items-center text-text-secondary text-sm font-medium">Halo, <?= esc(session()->get('nama')) ?></span>
            <a href="<?= base_url('/riwayat') ?>" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-transparent border border-primary text-primary hover:bg-primary/20 text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Riwayat</span>
            </a>
            <?php if (session()->get('role') === 'admin'): ?>
                <a href="<?= base_url('/admin/dashboard') ?>" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] hover:bg-accent hover:text-background-dark transition-colors">
                    <span class="truncate">Admin</span>
                </a>
            <?php endif; ?>
            <a href="<?= base_url('/auth/logout') ?>" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] hover:bg-accent hover:text-background-dark transition-colors">
                <span class="truncate">Logout</span>
            </a>
        <?php endif; ?>
    </div>
</header>

<!-- Hero Section -->
<main class="flex-grow px-4 md:px-10 py-10">
<div class="@container">
<div class="@[480px]:p-4">
<div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4" style='background-image: linear-gradient(rgba(10, 25, 47, 0.8) 0%, rgba(10, 25, 47, 0.95) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBV_9BAgMw8CDcVqaWKjbwu7fgeguCZv1eE_aSR7R4K600FaZk1PV8wxIshKAKUHeHWJwuCt8BnaoOn4o4F6sQGT0EmGmuXIhzjuZzn2osSWRnfI6zBlB9_v7Neg26Xc_u2sxW-MM4ADILBeArzmIza2qM7ZdHoNvVx1OAWGipkQFQtj6pfrpo-vYo10KkggnPEuIy1s8lcsoGNYfj-PD94erdFeesk1_dHUHj8nPvsz2tK-S9jwYJ8yk4oRDLlAG8gSiipvFqn1puK");'>
<div class="flex flex-col gap-4 text-center">
    <h1 class="text-text-primary text-4xl font-black leading-tight tracking-tighter @[480px]:text-6xl @[480px]:font-black @[480px]:leading-tight">
        Gear <span class="text-primary">Eksklusif.</span>
    </h1>
    <h2 class="text-text-secondary text-base font-normal leading-normal @[480px]:text-lg @[480px]:font-normal @[480px]:leading-normal max-w-xl">
        Sewa kamera dan lensa sinematik terbaik, kini lebih mudah.
    </h2>
</div>
<a href="<?= base_url('/katalog') ?>" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 @[480px]:h-14 @[480px]:px-8 bg-primary text-background-dark text-base font-bold leading-normal tracking-[0.015em] @[480px]:text-lg @[480px]:font-bold hover:bg-accent transition-colors">
    <span class="truncate">Jelajahi Koleksi &rarr;</span>
</a>

<a href="<?= base_url('/porto') ?>" class="inline-flex items-center justify-center rounded-lg h-12 px-8 bg-card-dark border border-primary text-primary hover:bg-primary/20 font-bold transition-colors">
    Lihat Hasil Produk
</a>


<!-- Trust Badges -->
<div class="mt-8 flex justify-center items-center space-x-6">
    <p class="text-sm font-semibold text-text-primary border-r pr-6 border-text-secondary">⭐️ Rating 4.9/5.0</p>
    <p class="text-sm font-semibold text-text-primary">1000+ Proyek Terlaksana</p>
</div>
</div>
</div>
</div>

<!-- Search Section -->
<div class="px-4 py-8">
    <label class="flex flex-col min-w-40 h-14 w-full">
        <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
            <div class="text-text-secondary flex border-none bg-card-dark items-center justify-center pl-4 rounded-l-lg border-r-0">
                <span class="material-symbols-outlined">search</span>
            </div>
            <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary border-none bg-card-dark focus:border-none h-full placeholder:text-text-secondary px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal" placeholder="Cari kamera berdasarkan nama, merek, atau tipe" value=""/>
        </div>
    </label>
</div>

<!-- Featured Products Section -->
<section class="py-8">
    <h2 class="text-text-primary text-3xl font-bold leading-tight tracking-tight px-4 pb-6">Koleksi <span class="text-primary">Eksklusif</span> Kami</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
        <?php if (!empty($featured_products)): ?>
            <?php foreach ($featured_products as $product): ?>
                <div class="bg-card-dark rounded-xl p-6 flex flex-col gap-4 group hover:ring-2 hover:ring-primary transition-all duration-300">
                    <img src="<?= base_url('uploads/products/' . esc($product['gambar'])) ?>" 
                         alt="<?= esc($product['nama_produk']) ?>" 
                         class="rounded-lg aspect-video object-cover"
                         onerror="this.src='https://placehold.co/600x400/12233f/00BFFF?text=<?= urlencode($product['nama_produk']) ?>'">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-text-primary text-xl font-bold"><?= esc($product['nama_produk']) ?></h3>
                        <p class="text-text-secondary text-sm character-limiter"><?= esc($product['deskripsi']) ?></p>
                        <p class="text-primary text-2xl font-bold mt-2">
                            Rp <?= number_format($product['harga_per_hari'], 0, ',', '.') ?>
                            <span class="text-text-secondary text-sm font-normal">/ hari</span>
                        </p>
                    </div>
                    
                    <!-- Stock & Category -->
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-sm <?= $product['stok'] > 0 ? 'text-accent' : 'text-red-400' ?> font-semibold">
                            <?= $product['stok'] > 0 ? 'Stok: ' . $product['stok'] : 'Stok Habis' ?>
                        </span>
                        <?php if (isset($product['kategori'])): ?>
                            <span class="text-xs bg-primary/20 text-primary px-2 py-1 rounded-full">
                                <?= esc($product['kategori']) ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if ($product['stok'] > 0): ?>
                        <a href="<?= base_url('sewa/' . $product['id']) ?>" class="w-full text-center bg-primary hover:bg-accent text-background-dark font-bold py-3 rounded-lg transition-colors mt-2">
                            Sewa Sekarang
                        </a>
                    <?php else: ?>
                        <button class="w-full text-center bg-gray-600 cursor-not-allowed text-text-secondary font-bold py-3 rounded-lg mt-2">
                            Stok Habis
                        </button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-3 text-center py-10">
                <p class="text-text-secondary text-lg">Belum ada produk tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="text-center mt-8">
        <a href="<?= base_url('/katalog') ?>" class="text-primary hover:text-accent text-lg font-bold transition-colors border-b-2 border-primary/50 hover:border-accent pb-1">
            Lihat Semua Peralatan &rarr;
        </a>
    </div>
</section>

<!-- Features Section -->
<section id="keunggulan" class="py-16">
    <h2 class="text-text-primary text-3xl font-bold leading-tight tracking-tight px-4 pb-8 text-center">Keunggulan <span class="text-primary">Layanan Kami</span></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 p-4 text-center">
        <div class="flex flex-col items-center gap-4 p-6 bg-card-dark rounded-lg hover:ring-2 hover:ring-primary transition-all duration-300">
            <span class="material-symbols-outlined text-accent text-5xl">verified</span>
            <h3 class="text-text-primary text-xl font-bold">Kualitas Terjamin</h3>
            <p class="text-text-secondary text-sm">Semua kamera dan lensa rutin dicek & diservis, siap untuk produksi profesional.</p>
        </div>
        <div class="flex flex-col items-center gap-4 p-6 bg-card-dark rounded-lg hover:ring-2 hover:ring-primary transition-all duration-300">
            <span class="material-symbols-outlined text-accent text-5xl">security</span>
            <h3 class="text-text-primary text-xl font-bold">Proteksi & Asuransi</h3>
            <p class="text-text-secondary text-sm">Unit dilindungi asuransi, sehingga penyewaan lebih aman dan nyaman.</p>
        </div>
        <div class="flex flex-col items-center gap-4 p-6 bg-card-dark rounded-lg hover:ring-2 hover:ring-primary transition-all duration-300">
            <span class="material-symbols-outlined text-accent text-5xl">schedule</span>
            <h3 class="text-text-primary text-xl font-bold">Konfirmasi Cepat</h3>
            <p class="text-text-secondary text-sm">Booking online efisien, konfirmasi transaksi langsung dalam hitungan menit.</p>
        </div>
        <div class="flex flex-col items-center gap-4 p-6 bg-card-dark rounded-lg hover:ring-2 hover:ring-primary transition-all duration-300">
            <span class="material-symbols-outlined text-accent text-5xl">support_agent</span>
            <h3 class="text-text-primary text-xl font-bold">Dukungan 24/7</h3>
            <p class="text-text-secondary text-sm">Tim support siap membantu kapan saja, untuk kelancaran proyek Anda.</p>
        </div>
    </div>
</section>

<!-- Testimonials Section
<section id="testimoni" class="py-16">
    <h2 class="text-text-primary text-3xl font-bold leading-tight tracking-tight px-4 pb-8 text-center">Kata <span class="text-primary">Klien Kami</span></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-4">
        <div class="bg-card-dark p-8 rounded-xl hover:ring-2 hover:ring-primary transition-all duration-300">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-background-dark font-bold text-lg">
                    A
                </div>
                <div class="ml-4">
                    <h4 class="font-bold text-text-primary">Andi Wijaya</h4>
                    <div class="flex text-yellow-400">
                        ★★★★★
                    </div>
                </div>
            </div>
            <p class="text-text-secondary italic">"Pelayanan sangat cepat dan kamera dalam kondisi prima. Hasil shooting untuk project iklan client sangat memuaskan!"</p>
        </div>
        <div class="bg-card-dark p-8 rounded-xl hover:ring-2 hover:ring-primary transition-all duration-300">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-background-dark font-bold text-lg">
                    S
                </div>
                <div class="ml-4">
                    <h4 class="font-bold text-text-primary">Sarah Photography</h4>
                    <div class="flex text-yellow-400">
                        ★★★★★
                    </div>
                </div>
            </div>
            <p class="text-text-secondary italic">"Lensa yang disewa sangat tajam, proses sewa mudah, dan tim support sangat helpful. Recommended banget!"</p>
        </div>
        <div class="bg-card-dark p-8 rounded-xl hover:ring-2 hover:ring-primary transition-all duration-300">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-background-dark font-bold text-lg">
                    R
                </div>
                <div class="ml-4">
                    <h4 class="font-bold text-text-primary">Rendra Production</h4>
                    <div class="flex text-yellow-400">
                        ★★★★★
                    </div>
                </div>
            </div>
            <p class="text-text-secondary italic">"Sudah beberapa kali sewa lighting equipment di sini. Kualitas terjamin dan harga kompetitif. Bakal repeat order terus!"</p>
        </div>
    </div>
</section> -->

<!-- How It Works Section -->
<section id="cara-sewa" class="py-16">
    <h2 class="text-text-primary text-3xl font-bold leading-tight tracking-tight px-4 pb-8 text-center">3 Langkah <span class="text-primary">Sewa Kamera</span></h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-4 text-center">
        <div class="flex flex-col items-center gap-4 p-6 bg-card-dark rounded-xl hover:ring-2 hover:ring-primary transition-all duration-300">
            <div class="w-14 h-14 bg-primary text-background-dark flex items-center justify-center rounded-full text-2xl font-extrabold shadow-md">1</div>
            <h3 class="text-text-primary text-xl font-bold">Pilih & Reservasi</h3>
            <p class="text-text-secondary text-sm">Pilih kamera/lensa, tentukan tanggal sewa, dan lakukan deposit online dengan cepat.</p>
        </div>
        <div class="flex flex-col items-center gap-4 p-6 bg-card-dark rounded-xl hover:ring-2 hover:ring-primary transition-all duration-300">
            <div class="w-14 h-14 bg-primary text-background-dark flex items-center justify-center rounded-full text-2xl font-extrabold shadow-md">2</div>
            <h3 class="text-text-primary text-xl font-bold">Verifikasi Cepat</h3>
            <p class="text-text-secondary text-sm">Verifikasi identitas Anda via KTP atau dokumen resmi. Aman & instan.</p>
        </div>
        <div class="flex flex-col items-center gap-4 p-6 bg-card-dark rounded-xl hover:ring-2 hover:ring-primary transition-all duration-300">
            <div class="w-14 h-14 bg-primary text-background-dark flex items-center justify-center rounded-full text-2xl font-extrabold shadow-md">3</div>
            <h3 class="text-text-primary text-xl font-bold">Ambil atau Dikirim</h3>
            <p class="text-text-secondary text-sm">Ambil unit di studio kami atau gunakan layanan kirim. Siap produksi tanpa ribet!</p>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="py-16 bg-primary/10 border-t border-b border-primary/20">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-text-primary text-4xl font-bold mb-4">
            Tingkatkan <span class="text-primary">Produksi Anda</span>
        </h2>
        <p class="text-text-secondary text-lg mb-8 max-w-2xl mx-auto">
            Sewa kamera & lensa profesional tanpa harus membeli. Solusi mudah, cepat, dan aman untuk semua proyek Anda.
        </p>
        <a href="<?= base_url('/katalog') ?>" class="inline-flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-8 bg-primary text-background-dark text-lg font-bold leading-normal tracking-[0.015em] hover:bg-accent transition-colors">
            <span class="truncate">Sewa Sekarang &rarr;</span>
        </a>
    </div>
</section>

</main>

<!-- Footer -->
<footer class="bg-card-dark/50 mt-10">
<div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-2 md:grid-cols-4 gap-8">
<div class="space-y-4">
    <h3 class="text-sm font-semibold text-text-secondary tracking-wider uppercase">Solusi</h3>
    <ul class="space-y-2">
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Fotografi</a></li>
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Videografi</a></li>
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Acara</a></li>
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Korporat</a></li>
    </ul>
</div>
<div class="space-y-4">
    <h3 class="text-sm font-semibold text-text-secondary tracking-wider uppercase">Dukungan</h3>
    <ul class="space-y-2">
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Bantuan</a></li>
        <li><a class="text-base text-text-primary hover:text-accent" href="#">FAQ</a></li>
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Hubungi Kami</a></li>
    </ul>
</div>
<div class="space-y-4">
    <h3 class="text-sm font-semibold text-text-secondary tracking-wider uppercase">Perusahaan</h3>
    <ul class="space-y-2">
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Tentang Kami</a></li>
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Blog</a></li>
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Karir</a></li>
    </ul>
</div>
<div class="space-y-4">
    <h3 class="text-sm font-semibold text-text-secondary tracking-wider uppercase">Legal</h3>
    <ul class="space-y-2">
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Kebijakan Privasi</a></li>
        <li><a class="text-base text-text-primary hover:text-accent" href="#">Syarat & Ketentuan</a></li>
    </ul>
</div>
</div>
<div class="mt-8 border-t border-text-secondary/20 pt-8 flex items-center justify-between">
<p class="text-base text-text-secondary">© <?= date('Y') ?> PRORENTAL. Semua Hak Cipta Dilindungi.</p>
</div>
</div>
</footer>

</div>
</div>
</div>
</div>
</body>
</html>