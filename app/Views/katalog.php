<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= esc($title) ?> - PRORENTAL</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#00BFFF",
                        "background-light": "#f6f7f8",
                        "background-dark": "#0A192F",
                        "card-dark": "#1D2A43",
                        "accent": "#64FFDA",
                        "text-primary": "#E6F1FF",
                        "text-secondary": "#8892B0"
                    },
                    fontFamily: {
                        "display": ["Space Grotesk", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24
        }
        .character-limiter {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-background-dark font-display text-text-secondary">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[1200px] flex-1">

<!-- Header/Navigation -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-card-dark/50 px-6 py-4 sticky top-0 bg-background-dark/80 backdrop-blur-sm z-10">
    <div class="flex items-center gap-4 text-text-primary">
        <div class="size-6 text-primary">
            <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93L15 8h-3V3.07zM15 10h3l1.87 2.07c.13.87.23 1.77.23 2.68 0 1.93-.68 3.68-1.85 5.06L15 16h-3v-6zm2 8.93c-1.12.54-2.31.87-3.59.93L17 14h3c-.59 1.94-1.96 3.56-3.79 4.54l-1.21-1.61z"></path>
            </svg>
        </div>
        <h2 class="text-text-primary text-xl font-bold leading-tight tracking-[-0.015em]">PRO<span class="text-primary">RENTAL</span></h2>
    </div>
    
    <!-- Navigation Links -->
    <div class="hidden md:flex flex-1 justify-center items-center gap-9">
        <a class="text-text-secondary hover:text-primary text-base font-medium leading-normal transition-colors" href="<?= base_url('/') ?>">Beranda</a>
        <a class="text-primary text-base font-bold leading-normal" href="<?= base_url('/katalog') ?>">Katalog</a>
        <a class="text-text-secondary hover:text-primary text-base font-medium leading-normal transition-colors" href="<?= base_url('/') ?>#keunggulan">Fitur Premium</a>
        <a class="text-text-secondary hover:text-primary text-base font-medium leading-normal transition-colors" href="<?= base_url('/') ?>#testimoni">Klien</a>
    </div>

    <!-- Auth Buttons -->
    <div class="flex items-center gap-4">
        <?php if (!session()->get('isLoggedIn')): ?>
            <a href="<?= base_url('/auth/login') ?>" class="flex items-center justify-center rounded-full h-10 px-4 bg-transparent border border-primary text-primary text-sm font-bold hover:bg-primary/20 transition-colors">
                <span class="truncate">Masuk</span>
            </a>
            <a href="<?= base_url('/auth/register') ?>" class="flex items-center justify-center rounded-full h-10 px-4 bg-primary text-background-dark text-sm font-bold hover:bg-accent transition-colors">
                <span class="truncate">Daftar</span>
            </a>
        <?php else: ?>
            <span class="text-text-secondary text-sm font-medium hidden md:block">Halo, <?= esc(session()->get('nama')) ?></span>
            <a href="<?= base_url('/riwayat') ?>" class="flex items-center justify-center rounded-full h-10 w-10 bg-card-dark text-text-primary hover:bg-primary transition-colors" title="Riwayat Sewa">
                <span class="material-symbols-outlined">history</span>
            </a>
            <?php if (session()->get('role') === 'admin'): ?>
                <a href="<?= base_url('/admin/dashboard') ?>" class="flex items-center justify-center rounded-full h-10 px-4 bg-primary text-background-dark text-sm font-bold hover:bg-accent transition-colors">
                    <span class="truncate">Admin</span>
                </a>
            <?php endif; ?>
            <a href="<?= base_url('/auth/logout') ?>" class="flex items-center justify-center rounded-full h-10 w-10 bg-card-dark text-text-primary hover:bg-primary transition-colors" title="Logout">
                <span class="material-symbols-outlined">logout</span>
            </a>
        <?php endif; ?>
        
        <button class="md:hidden flex items-center justify-center rounded-full h-10 w-10 bg-card-dark text-text-primary hover:bg-primary transition-colors">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>
</header>

<!-- Header Katalog -->
<main class="flex-1 px-4 py-8">
    <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
        <h1 class="text-text-primary text-4xl font-black leading-tight tracking-[-0.033em]">
            Katalog <span class="text-primary">Lengkap</span>
        </h1>
        <p class="text-text-secondary text-lg max-w-2xl">
            Temukan peralatan kamera dan lensa profesional untuk mendukung kreativitas Anda
        </p>
    </div>

    <!-- Search Section -->
    <div class="mb-8 px-4 py-3">
        <form method="get" action="<?= base_url('/katalog') ?>" class="flex flex-col md:flex-row gap-4">
            <div class="flex flex-1">
                <div class="text-text-secondary flex bg-card-dark items-center justify-center pl-4 rounded-l-lg">
                    <span class="material-symbols-outlined">search</span>
                </div>
                <input type="text"
                       name="search"
                       value="<?= esc($search_keyword) ?>"
                       placeholder="Cari produk berdasarkan nama, merek, atau tipe..."
                       class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary border-none bg-card-dark h-full placeholder:text-text-secondary px-4 text-base font-normal leading-normal"/>
            </div>
            <button type="submit" class="flex items-center justify-center rounded-lg h-14 px-6 bg-primary text-background-dark text-base font-bold hover:bg-accent transition-colors">
                <span class="truncate">Cari</span>
            </button>
            <?php if (!empty($search_keyword) || !empty($current_category)): ?>
                <a href="<?= base_url('/katalog') ?>" class="flex items-center justify-center rounded-lg h-14 px-6 bg-card-dark text-text-primary border border-text-secondary/30 text-base font-bold hover:bg-text-secondary/20 transition-colors">
                    <span class="truncate">Reset</span>
                </a>
            <?php endif; ?>
        </form>
    </div>

    <div class="flex flex-col md:flex-row gap-8">
        <!-- Filter Sidebar -->
        <aside class="w-full md:w-1/4">
            <div class="bg-card-dark rounded-lg p-6 sticky top-24">
                <h3 class="text-text-primary text-lg font-bold mb-4">Filter</h3>
                <div class="space-y-6">
                    
                    <!-- Kategori Filter -->
                    <div>
                        <label class="text-text-primary font-medium mb-2 block">Kategori</label>
                        <div class="space-y-2">
                            <a href="<?= base_url('/katalog') ?>" 
                               class="block w-full text-left px-3 py-2 rounded-md text-text-secondary hover:bg-primary/20 hover:text-primary transition-colors <?= empty($current_category) ? 'bg-primary/20 text-primary' : 'bg-transparent' ?>">
                                Semua Kategori
                            </a>
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <a href="<?= base_url('/katalog?kategori=' . $category['id']) ?>" 
                                       class="block w-full text-left px-3 py-2 rounded-md text-text-secondary hover:bg-primary/20 hover:text-primary transition-colors <?= $current_category == $category['id'] ? 'bg-primary/20 text-primary' : 'bg-transparent' ?>">
                                        <?= esc($category['nama_kategori']) ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Merek Filter -->
                    <div>
                        <label class="text-text-primary font-medium mb-2 block">Merek</label>
                        <select class="w-full bg-background-dark border border-text-secondary/30 rounded-md px-3 py-2 text-text-primary focus:outline-none focus:ring-2 focus:ring-primary">
                            <option>Semua Merek</option>
                            <option>Canon</option>
                            <option>Sony</option>
                            <option>Nikon</option>
                            <option>Fujifilm</option>
                            <option>Panasonic</option>
                        </select>
                    </div>

                    <!-- Rentang Harga -->
                    <div>
                        <label class="text-text-primary font-medium mb-2 block" for="price-range">Rentang Harga</label>
                        <input class="w-full h-2 bg-background-dark rounded-lg appearance-none cursor-pointer accent-primary" 
                               id="price-range" max="1000000" min="0" type="range"/>
                        <div class="flex justify-between text-sm text-text-secondary mt-1">
                            <span>Rp 0</span>
                            <span>Rp 1.000.000</span>
                        </div>
                    </div>

                    <!-- Status Stok -->
                    <div>
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input class="form-checkbox h-5 w-5 text-primary bg-background-dark border-text-secondary/30 rounded focus:ring-primary" 
                                   type="checkbox"/>
                            <span class="text-text-primary">Hanya yang tersedia</span>
                        </label>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 pt-4">
                        <button class="w-full text-center rounded-lg h-10 bg-primary text-background-dark text-sm font-bold hover:bg-accent transition-colors">
                            Terapkan
                        </button>
                        <button class="w-full text-center rounded-lg h-10 bg-card-dark text-text-primary border border-text-secondary/30 text-sm font-bold hover:bg-text-secondary/20 transition-colors">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Product Grid -->
        <div class="w-full md:w-3/4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="flex flex-col bg-card-dark rounded-xl overflow-hidden group hover:shadow-2xl hover:shadow-primary/20 hover:-translate-y-1 transition-all duration-300">
                            <img src="<?= base_url('uploads/produk/' . esc($product['gambar'])) ?>" 
                                 alt="<?= esc($product['nama_produk']) ?>" 
                                class="w-full aspect-video object-cover"
                                onerror="this.src='https://placehold.co/600x400/1D2A43/00BFFF?text=<?= urlencode($product['nama_produk']) ?>'"/>
                            
                            <div class="p-4 flex flex-col flex-grow">
                                <h4 class="text-text-primary text-lg font-bold leading-normal"><?= esc($product['nama_produk']) ?></h4>
                                <p class="text-text-secondary text-sm mt-2 character-limiter"><?= esc($product['deskripsi']) ?></p>
                                
                                <div class="flex items-center justify-between mt-3">
                                    <p class="text-primary text-base font-semibold">
                                        Rp <?= number_format($product['harga_per_hari'], 0, ',', '.') ?>/hari
                                    </p>
                                    <span class="text-xs bg-primary/20 text-primary px-2 py-1 rounded-full">
                                        <?= esc($product['kategori'] ?? 'Kamera') ?>
                                    </span>
                                </div>

                                <!-- Stok Indicator -->
                                <p class="<?= $product['stok'] > 0 ? 'text-accent' : 'text-red-400' ?> text-sm font-medium leading-normal mt-2">
                                    <?= $product['stok'] > 0 ? 'Tersedia' : 'Stok Habis' ?>
                                    <?php if ($product['stok'] > 0): ?>
                                        <span class="text-text-secondary">(<?= $product['stok'] ?> unit)</span>
                                    <?php endif; ?>
                                </p>

                                <!-- Action Buttons -->
                                <div class="mt-4 pt-4 border-t border-text-secondary/20 flex gap-2 flex-grow items-end">
                                    <a href="<?= base_url('produk/' . $product['id']) ?>" 
                                            class="flex-1 text-center rounded-lg h-10 bg-transparent border-2 border-primary text-primary text-sm font-bold hover:bg-primary/20 transition-colors flex items-center justify-center">
                                                Lihat Detail
                                        </a>
                                    <?php if ($product['stok'] > 0): ?>
                                        <a href="<?= base_url('sewa/' . $product['id']) ?>" 
                                           class="flex-1 text-center rounded-lg h-10 bg-primary text-background-dark text-sm font-bold hover:bg-accent transition-colors flex items-center justify-center">
                                            Sewa
                                        </a>
                                    <?php else: ?>
                                        <button class="flex-1 text-center rounded-lg h-10 bg-gray-500 text-gray-300 text-sm font-bold cursor-not-allowed">
                                            Stok Habis
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-3 text-center py-16">
                        <div class="text-text-secondary mb-4">
                            <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-8V4a1 1 0 00-1-1h-2a1 1 0 00-1 1v1M9 7h6"></path>
                            </svg>
                        </div>
                        <p class="text-text-secondary text-lg mb-4">Belum ada produk tersedia.</p>
                        <a href="<?= base_url('/') ?>" class="text-primary hover:text-accent font-semibold">
                            Kembali ke Beranda
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <nav aria-label="Pagination" class="flex items-center justify-center gap-4 mt-12">
                <button class="p-2 rounded-lg hover:bg-card-dark transition-colors disabled:opacity-50" disabled="">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <a class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-background-dark font-bold" href="#">1</a>
                <a class="w-10 h-10 flex items-center justify-center rounded-lg text-text-primary hover:bg-card-dark transition-colors" href="#">2</a>
                <a class="w-10 h-10 flex items-center justify-center rounded-lg text-text-primary hover:bg-card-dark transition-colors" href="#">3</a>
                <span class="text-text-primary">...</span>
                <a class="w-10 h-10 flex items-center justify-center rounded-lg text-text-primary hover:bg-card-dark transition-colors" href="#">8</a>
                <button class="p-2 rounded-lg hover:bg-card-dark transition-colors">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </nav>
        </div>
    </div>
</main>

<!-- CTA Section -->
<section class="py-16 bg-primary/10 border-t border-b border-primary/20 mt-16">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-text-primary text-3xl font-bold mb-6">
            Butuh Bantuan Memilih?
        </h2>
        <p class="text-text-secondary text-lg mb-8 max-w-2xl mx-auto">
            Tim ahli kami siap membantu Anda memilih peralatan yang tepat untuk kebutuhan produksi
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6281234567890" class="inline-flex items-center justify-center rounded-lg h-12 px-8 bg-green-500 hover:bg-green-600 text-white font-bold transition-colors">
                <span class="material-symbols-outlined mr-2">chat</span>
                Chat WhatsApp
            </a>
            <a href="tel:+6281234567890" class="inline-flex items-center justify-center rounded-lg h-12 px-8 bg-primary hover:bg-accent text-background-dark font-bold transition-colors">
                <span class="material-symbols-outlined mr-2">call</span>
                Telepon Kami
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="mt-16 border-t border-solid border-card-dark px-6 py-8">
    <div class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
            <h2 class="text-text-primary text-xl font-bold">PRORENTAL</h2>
            <p class="mt-2 text-text-secondary text-sm">Penyewaan kamera profesional mudah dan terpercaya.</p>
        </div>
        <div>
            <h4 class="text-text-primary font-semibold">Tautan Cepat</h4>
            <ul class="mt-4 space-y-2">
                <li><a class="text-text-secondary hover:text-primary transition-colors" href="<?= base_url('/') ?>">Beranda</a></li>
                <li><a class="text-text-secondary hover:text-primary transition-colors" href="<?= base_url('/katalog') ?>">Katalog</a></li>
                <li><a class="text-text-secondary hover:text-primary transition-colors" href="<?= base_url('/') ?>#keunggulan">Fitur Premium</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-text-primary font-semibold">Dukungan</h4>
            <ul class="mt-4 space-y-2">
                <li><a class="text-text-secondary hover:text-primary transition-colors" href="#">Bantuan</a></li>
                <li><a class="text-text-secondary hover:text-primary transition-colors" href="#">FAQ</a></li>
                <li><a class="text-text-secondary hover:text-primary transition-colors" href="#">Hubungi Kami</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-text-primary font-semibold">Kontak</h4>
            <ul class="mt-4 space-y-2 text-text-secondary">
                <li>Email: support@porental.com</li>
                <li>Telepon: +62 812 3456 7890</li>
            </ul>
        </div>
    </div>
    <div class="mt-8 text-center text-sm text-text-secondary border-t border-card-dark pt-6">
        <p>&copy; <?= date('Y') ?> PRORENTAL. Semua Hak Dilindungi.</p>
    </div>
</footer>

</div>
</div>
</div>
</div>
</body>
</html>