<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Tambah Produk - PRORENTAL</title>
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
        <a class="text-text-secondary hover:text-primary text-base font-medium leading-normal transition-colors" href="<?= base_url('/katalog') ?>">Katalog</a>
        <a class="text-primary text-base font-bold leading-normal" href="<?= base_url('/admin/dashboard') ?>">Dashboard</a>
    </div>

    <!-- Auth Buttons -->
    <div class="flex items-center gap-4">
        <span class="text-text-secondary text-sm font-medium hidden md:block">Halo, <?= esc(session()->get('nama')) ?></span>
        <a href="<?= base_url('/auth/logout') ?>" class="flex items-center justify-center rounded-full h-10 w-10 bg-card-dark text-text-primary hover:bg-primary transition-colors" title="Logout">
            <span class="material-symbols-outlined">logout</span>
        </a>
    </div>
</header>

<!-- Main Content -->
<main class="flex-1 px-4 py-8">
    <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
        <h1 class="text-text-primary text-4xl font-black leading-tight tracking-[-0.033em]">
            Tambah <span class="text-primary">Produk</span>
        </h1>
    </div>

    <div class="bg-card-dark rounded-xl p-6 max-w-4xl">
        <form action="/admin/produk/simpan" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Produk -->
                <div class="md:col-span-2">
                    <label class="block text-text-primary font-medium mb-2">Nama Produk</label>
                    <input type="text" 
                           name="nama_produk" 
                           class="w-full bg-background-dark border border-text-secondary/30 rounded-lg px-4 py-3 text-text-primary focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-text-secondary"
                           placeholder="Masukkan nama produk"
                           required>
                </div>

                <!-- Harga per Hari -->
                <div>
                    <label class="block text-text-primary font-medium mb-2">Harga per Hari</label>
                    <input type="number" 
                           name="harga_per_hari" 
                           class="w-full bg-background-dark border border-text-secondary/30 rounded-lg px-4 py-3 text-text-primary focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-text-secondary"
                           placeholder="Masukkan harga sewa per hari"
                           required>
                </div>

                <!-- Stok -->
                <div>
                    <label class="block text-text-primary font-medium mb-2">Stok</label>
                    <input type="number" 
                           name="stok" 
                           class="w-full bg-background-dark border border-text-secondary/30 rounded-lg px-4 py-3 text-text-primary focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-text-secondary"
                           placeholder="Masukkan jumlah stok"
                           required>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-text-primary font-medium mb-2">Status</label>
                    <select name="status" 
                            class="w-full bg-background-dark border border-text-secondary/30 rounded-lg px-4 py-3 text-text-primary focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="active">Aktif</option>
                        <option value="unactive">Tidak Aktif</option>
                    </select>
                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label class="block text-text-primary font-medium mb-2">Deskripsi</label>
                    <textarea name="deskripsi" 
                              rows="3"
                              class="w-full bg-background-dark border border-text-secondary/30 rounded-lg px-4 py-3 text-text-primary focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-text-secondary"
                              placeholder="Masukkan deskripsi produk"></textarea>
                </div>

                <!-- Spesifikasi -->
                <div class="md:col-span-2">
                    <label class="block text-text-primary font-medium mb-2">Spesifikasi</label>
                    <textarea name="spesifikasi" 
                              rows="3"
                              class="w-full bg-background-dark border border-text-secondary/30 rounded-lg px-4 py-3 text-text-primary focus:outline-none focus:ring-2 focus:ring-primary placeholder:text-text-secondary"
                              placeholder="Masukkan spesifikasi teknis produk"></textarea>
                </div>

                <!-- Gambar Produk -->
                <div class="md:col-span-2">
                    <label class="block text-text-primary font-medium mb-2">Gambar Produk</label>
                    <input type="file" 
                           name="gambar" 
                           accept="image/*"
                           class="w-full bg-background-dark border border-text-secondary/30 rounded-lg px-4 py-3 text-text-primary focus:outline-none focus:ring-2 focus:ring-primary file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-background-dark hover:file:bg-accent"
                           required>
                    <p class="text-text-secondary text-sm mt-2">Unggah gambar produk (format: JPG, PNG, JPEG)</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 mt-8 pt-6 border-t border-text-secondary/20">
                <button type="submit" 
                        class="flex items-center justify-center rounded-lg h-12 px-8 bg-primary text-background-dark text-base font-bold hover:bg-accent transition-colors">
                    <span class="material-symbols-outlined mr-2">save</span>
                    Simpan Produk
                </button>
                <a href="/admin/produk" 
                   class="flex items-center justify-center rounded-lg h-12 px-8 bg-card-dark text-text-primary border border-text-secondary/30 text-base font-bold hover:bg-text-secondary/20 transition-colors">
                    <span class="material-symbols-outlined mr-2">arrow_back</span>
                    Kembali
                </a>
            </div>
        </form>
    </div>
</main>

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
                <li><a class="text-text-secondary hover:text-primary transition-colors" href="<?= base_url('/admin/dashboard') ?>">Dashboard</a></li>
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