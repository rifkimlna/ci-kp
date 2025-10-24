<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= esc($product['nama_produk'] ?? 'Detail Produk') ?> - PRORENTAL</title>
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
    </style>
</head>
<body class="bg-background-dark font-display text-text-secondary">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[1200px] flex-1">

<!-- Header/Navigation -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-card-dark/50 px-6 py-4">
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

<main class="flex-1 px-4 py-8">
    <!-- Breadcrumb -->
    <div class="flex flex-wrap gap-2 p-4">
        <a class="text-text-secondary hover:text-primary text-sm font-medium leading-normal transition-colors" href="<?= base_url('/') ?>">Beranda</a>
        <span class="text-text-secondary text-sm font-medium leading-normal">/</span>
        <a class="text-text-secondary hover:text-primary text-sm font-medium leading-normal transition-colors" href="<?= base_url('/katalog') ?>">Katalog</a>
        <span class="text-text-secondary text-sm font-medium leading-normal">/</span>
        <span class="text-text-primary text-sm font-medium leading-normal"><?= esc($product['nama_produk'] ?? 'Produk') ?></span>
    </div>

    <?php if (isset($product)): ?>
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 mt-4">
        <!-- Left Column: Image Gallery -->
        <div class="lg:col-span-3">
            <div class="w-full bg-center bg-no-repeat bg-cover flex flex-col justify-end overflow-hidden bg-card-dark rounded-xl min-h-96" 
                 style='background-image: url("<?= base_url('uploads/products/' . esc($product['gambar'])) ?>")'
                 onerror="this.style.backgroundImage='url(https://placehold.co/600x400/1D2A43/00BFFF?text=<?= urlencode($product['nama_produk']) ?>')'">
            </div>
            <div class="grid grid-cols-4 gap-4 mt-4">
                <!-- Thumbnail images -->
                <div class="h-24 bg-card-dark rounded-lg bg-cover bg-center cursor-pointer hover:ring-2 hover:ring-primary transition-all"
                     style="background-image: url('<?= base_url('uploads/products/' . esc($product['gambar'])) ?>')"
                     onerror="this.style.backgroundImage='url(https://placehold.co/200x200/1D2A43/00BFFF?text=<?= urlencode($product['nama_produk']) ?>')'">
                </div>
                <!-- Additional thumbnails -->
                <div class="h-24 bg-card-dark rounded-lg bg-cover bg-center cursor-pointer hover:ring-2 hover:ring-primary transition-all" 
                     style="background-image: url('https://placehold.co/200x200/1D2A43/00BFFF?text=View+2')"></div>
                <div class="h-24 bg-card-dark rounded-lg bg-cover bg-center cursor-pointer hover:ring-2 hover:ring-primary transition-all" 
                     style="background-image: url('https://placehold.co/200x200/1D2A43/00BFFF?text=View+3')"></div>
                <div class="h-24 bg-card-dark rounded-lg bg-cover bg-center cursor-pointer hover:ring-2 hover:ring-primary transition-all" 
                     style="background-image: url('https://placehold.co/200x200/1D2A43/00BFFF?text=View+4')"></div>
            </div>
        </div>

        <!-- Right Column: Product Info -->
        <div class="lg:col-span-2">
            <div class="bg-card-dark p-6 rounded-xl">
                <h1 class="text-text-primary text-3xl font-bold leading-tight tracking-[-0.033em]"><?= esc($product['nama_produk']) ?></h1>
                
                <!-- Price -->
                <p class="text-primary text-2xl font-bold mt-2">
                    Rp <?= number_format($product['harga_per_hari'], 0, ',', '.') ?>/hari
                </p>
                <p class="text-text-secondary text-base font-normal leading-normal">
                    atau Rp <?= number_format($product['harga_per_hari'] * 7, 0, ',', '.') ?>/minggu
                </p>

                <!-- Rating -->
                <div class="flex items-center gap-2 mt-4">
                    <div class="flex gap-0.5 text-yellow-400">
                        <span class="material-symbols-outlined !text-lg">star</span>
                        <span class="material-symbols-outlined !text-lg">star</span>
                        <span class="material-symbols-outlined !text-lg">star</span>
                        <span class="material-symbols-outlined !text-lg">star</span>
                        <span class="material-symbols-outlined !text-lg">star_half</span>
                    </div>
                    <p class="text-text-primary text-sm font-normal leading-normal">4.5 (120 ulasan)</p>
                </div>

                <!-- Stock Status -->
                <div class="mt-4">
                    <span class="text-sm <?= $product['stok'] > 0 ? 'text-accent' : 'text-red-400' ?> font-semibold">
                        <?= $product['stok'] > 0 ? 'Stok: ' . $product['stok'] . ' unit tersedia' : 'Stok Habis' ?>
                    </span>
                </div>

                <!-- Category -->
                <div class="mt-2">
                    <span class="text-xs bg-primary/20 text-primary px-2 py-1 rounded-full">
                        <?= esc($product['nama_kategori'] ?? $product['kategori'] ?? 'Kamera') ?>
                    </span>
                </div>

                <!-- Description Preview -->
                <div class="mt-4">
                    <p class="text-text-secondary text-sm">
                        <?= esc($product['deskripsi']) ?>
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 pt-4 border-t border-text-secondary/20 flex gap-2">
                    <?php if ($product['stok'] > 0): ?>
                        <a href="<?= base_url('sewa/' . $product['id']) ?>" 
                           class="flex-1 text-center rounded-lg h-12 bg-primary text-background-dark text-base font-bold hover:bg-accent transition-colors flex items-center justify-center">
                            <span class="material-symbols-outlined mr-2">shopping_cart</span>
                            Sewa Sekarang
                        </a>
                    <?php else: ?>
                        <button class="flex-1 text-center rounded-lg h-12 bg-gray-500 text-gray-300 text-base font-bold cursor-not-allowed flex items-center justify-center">
                            <span class="material-symbols-outlined mr-2">block</span>
                            Stok Habis
                        </button>
                    <?php endif; ?>
                </div>

                <!-- Additional Info -->
                <div class="mt-6 space-y-3 text-sm text-text-secondary">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">local_shipping</span>
                        <span>Gratis pengiriman untuk rental > 3 hari</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">security</span>
                        <span>Dilindungi asuransi kerusakan</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">support_agent</span>
                        <span>Dukungan teknis 24/7</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabbed Content Section -->
    <div class="mt-10">
        <div class="border-b border-card-dark">
            <nav aria-label="Tabs" class="-mb-px flex space-x-8">
                <button class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-primary border-primary" data-tab="description">
                    Deskripsi & Spesifikasi
                </button>
                <button class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-text-secondary border-transparent hover:text-text-primary hover:border-text-primary/50 transition-colors" data-tab="specifications">
                    Spesifikasi Lengkap
                </button>
                <button class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-text-secondary border-transparent hover:text-text-primary hover:border-text-primary/50 transition-colors" data-tab="reviews">
                    Ulasan Pengguna (120)
                </button>
            </nav>
        </div>
        
        <div class="py-6">
            <!-- Deskripsi & Spesifikasi Content -->
            <div id="description" class="tab-content">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-bold text-text-primary">Deskripsi Produk</h3>
                        <p class="mt-4 text-text-secondary text-base leading-relaxed">
                            <?= nl2br(esc($product['deskripsi'])) ?>
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-text-primary">Spesifikasi Utama</h3>
                        <ul class="mt-4 space-y-3 text-text-secondary">
                            <li class="flex justify-between py-2 border-b border-card-dark">
                                <span class="font-medium text-text-primary">Kategori:</span>
                                <span><?= esc($product['nama_kategori'] ?? $product['kategori'] ?? 'Kamera') ?></span>
                            </li>
                            <li class="flex justify-between py-2 border-b border-card-dark">
                                <span class="font-medium text-text-primary">Merek:</span>
                                <span><?= esc($product['merek'] ?? 'Canon') ?></span>
                            </li>
                            <li class="flex justify-between py-2 border-b border-card-dark">
                                <span class="font-medium text-text-primary">Status:</span>
                                <span class="<?= $product['stok'] > 0 ? 'text-accent' : 'text-red-400' ?> font-semibold">
                                    <?= $product['stok'] > 0 ? 'Tersedia' : 'Tidak Tersedia' ?>
                                </span>
                            </li>
                            <li class="flex justify-between py-2 border-b border-card-dark">
                                <span class="font-medium text-text-primary">Harga Sewa:</span>
                                <span class="text-primary font-semibold">Rp <?= number_format($product['harga_per_hari'], 0, ',', '.') ?>/hari</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Spesifikasi Lengkap Content -->
            <div id="specifications" class="tab-content hidden">
                <div class="bg-card-dark rounded-lg p-6">
                    <h3 class="text-xl font-bold text-text-primary mb-4">Spesifikasi Teknis Lengkap</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-text-primary mb-3">Spesifikasi Kamera</h4>
                            <ul class="space-y-2 text-text-secondary">
                                <li class="flex justify-between"><span>Sensor:</span> <span class="text-text-primary">Full-Frame CMOS 30.4MP</span></li>
                                <li class="flex justify-between"><span>Processor:</span> <span class="text-text-primary">DIGIC 6+</span></li>
                                <li class="flex justify-between"><span>ISO Range:</span> <span class="text-text-primary">100-32000</span></li>
                                <li class="flex justify-between"><span>Shutter Speed:</span> <span class="text-text-primary">1/8000s - 30s</span></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-text-primary mb-3">Fitur Video</h4>
                            <ul class="space-y-2 text-text-secondary">
                                <li class="flex justify-between"><span>Resolusi Video:</span> <span class="text-text-primary">4K 30fps</span></li>
                                <li class="flex justify-between"><span>Format Video:</span> <span class="text-text-primary">MP4, MOV</span></li>
                                <li class="flex justify-between"><span>Audio:</span> <span class="text-text-primary">Stereo Microphone</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Content -->
            <div id="reviews" class="tab-content hidden">
                <div class="bg-card-dark rounded-lg p-6">
                    <h3 class="text-xl font-bold text-text-primary mb-4">Ulasan Pengguna</h3>
                    <div class="space-y-6">
                        <!-- Sample Review 1 -->
                        <div class="border-b border-card-dark pb-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center text-primary font-bold">
                                    AB
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h4 class="font-bold text-text-primary">Andi Budiman</h4>
                                        <div class="flex gap-0.5 text-yellow-400">
                                            <span class="material-symbols-outlined !text-base">star</span>
                                            <span class="material-symbols-outlined !text-base">star</span>
                                            <span class="material-symbols-outlined !text-base">star</span>
                                            <span class="material-symbols-outlined !text-base">star</span>
                                            <span class="material-symbols-outlined !text-base">star</span>
                                        </div>
                                    </div>
                                    <p class="text-text-secondary text-sm mb-2">2 hari yang lalu</p>
                                    <p class="text-text-primary">Kameranya sangat bagus, kondisi seperti baru. Hasil foto tajam dan proses sewa mudah sekali!</p>
                                </div>
                            </div>
                        </div>
                        <!-- Sample Review 2 -->
                        <div class="border-b border-card-dark pb-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center text-primary font-bold">
                                    SL
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h4 class="font-bold text-text-primary">Sari Lestari</h4>
                                        <div class="flex gap-0.5 text-yellow-400">
                                            <span class="material-symbols-outlined !text-base">star</span>
                                            <span class="material-symbols-outlined !text-base">star</span>
                                            <span class="material-symbols-outlined !text-base">star</span>
                                            <span class="material-symbols-outlined !text-base">star</span>
                                            <span class="material-symbols-outlined !text-base text-text-secondary">star</span>
                                        </div>
                                    </div>
                                    <p class="text-text-secondary text-sm mb-2">1 minggu yang lalu</p>
                                    <p class="text-text-primary">Pelayanan cepat dan responsif. Kamera berfungsi dengan baik untuk pemotretan wedding.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    <?php if (!empty($related_products)): ?>
    <div class="mt-12">
        <h2 class="text-text-primary text-2xl font-bold mb-6">Kamera Lain yang Mungkin Anda Suka</h2>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(220px,1fr))] gap-6">
            <?php foreach ($related_products as $related): ?>
            <div class="flex flex-col bg-card-dark rounded-xl overflow-hidden group hover:shadow-2xl hover:shadow-primary/20 hover:-translate-y-1 transition-all duration-300">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover" 
                     style="background-image: url('<?= base_url('uploads/products/' . esc($related['gambar'])) ?>')"
                     onerror="this.style.backgroundImage='url(https://placehold.co/400x300/1D2A43/00BFFF?text=<?= urlencode($related['nama_produk']) ?>')'">
                </div>
                <div class="p-4 flex flex-col flex-grow">
                    <h4 class="text-text-primary text-lg font-bold leading-normal"><?= esc($related['nama_produk']) ?></h4>
                    <div class="flex items-center gap-2 text-sm text-text-secondary mt-1">
                        <span class="material-symbols-outlined text-base">photo_camera</span> 
                        <span><?= esc($related['nama_kategori'] ?? $related['kategori'] ?? 'Kamera') ?></span>
                    </div>
                    <p class="text-primary text-base font-semibold mt-2">Rp <?= number_format($related['harga_per_hari'], 0, ',', '.') ?>/hari</p>
                    <p class="<?= $related['stok'] > 0 ? 'text-accent' : 'text-red-400' ?> text-sm font-medium leading-normal mt-1">
                        <?= $related['stok'] > 0 ? 'Tersedia' : 'Stok Habis' ?>
                    </p>
                    <div class="mt-4 pt-4 border-t border-text-secondary/20 flex gap-2 flex-grow items-end">
                        <a href="<?= base_url('produk/' . $related['id']) ?>" 
                           class="flex-1 text-center rounded-lg h-10 bg-transparent border-2 border-primary text-primary text-sm font-bold hover:bg-primary/20 transition-colors flex items-center justify-center">
                            Lihat Detail
                        </a>
                        <?php if ($related['stok'] > 0): ?>
                            <a href="<?= base_url('sewa/' . $related['id']) ?>" 
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
        </div>
    </div>
    <?php endif; ?>

    <?php else: ?>
    <!-- Product Not Found -->
    <div class="text-center py-16">
        <div class="text-text-secondary mb-4">
            <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 20a7.962 7.962 0 01-5-1.709V14a4 4 0 014-4h2a4 4 0 014 4v4.291z"></path>
            </svg>
        </div>
        <p class="text-text-secondary text-lg mb-4">Produk tidak ditemukan.</p>
        <a href="<?= base_url('/katalog') ?>" class="text-primary hover:text-accent font-semibold">
            Kembali ke Katalog
        </a>
    </div>
    <?php endif; ?>
</main>

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
                <li>Email: support@prorental.com</li>
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

<script>
    // Tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');
                
                // Update active tab button
                tabButtons.forEach(btn => {
                    btn.classList.remove('text-primary', 'border-primary');
                    btn.classList.add('text-text-secondary', 'border-transparent');
                });
                this.classList.add('text-primary', 'border-primary');
                this.classList.remove('text-text-secondary', 'border-transparent');
                
                // Show target tab content
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                document.getElementById(targetTab).classList.remove('hidden');
            });
        });
        
        // Image gallery thumbnail click
        const thumbnails = document.querySelectorAll('.h-24.bg-cover');
        const mainImage = document.querySelector('.min-h-96');
        
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                const bgImage = this.style.backgroundImage;
                mainImage.style.backgroundImage = bgImage;
            });
        });
    });
</script>

</body>
</html>