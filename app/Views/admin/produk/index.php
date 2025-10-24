<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#38BDF8",
                        "background-light": "#f6f7f8",
                        "background-dark": "#0A192F",
                        "component-background-dark": "#1E293B",
                        "text-primary-dark": "#E2E8F0",
                        "text-secondary-dark": "#94A3B8",
                        error: "#F87171",
                        success: "#4ADE80",
                        warning: "#FBBF24",
                        purple: {
                            500: '#A855F7',
                            600: '#9333EA'
                        }
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
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
        }
        .sidebar-icon {
            @apply w-5 h-5 mr-3;
        }
    </style>
</head>
<body class="bg-background-dark font-display text-text-primary-dark">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="w-64 bg-component-background-dark border-r border-component-background-dark flex flex-col">
        <!-- Logo -->
        <div class="p-6 border-b border-component-background-dark">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-text-primary-dark">Sewa Kamera</h1>
                    <p class="text-text-secondary-dark text-sm">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="<?= base_url('/admin') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined sidebar-icon">dashboard</span>
                Dashboard
            </a>
            <a href="<?= base_url('/admin/transaksi') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined sidebar-icon">receipt_long</span>
                Transaksi
            </a>
            <a href="<?= base_url('/admin/produk') ?>" class="flex items-center px-4 py-3 bg-primary/20 text-primary rounded-xl font-semibold border border-primary/30">
                <span class="material-symbols-outlined sidebar-icon">inventory_2</span>
                Produk
            </a>
            <a href="<?= base_url('/admin/users') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined sidebar-icon">group</span>
                Users
            </a>
            <a href="<?= base_url('/') ?>" class="flex items-center px-4 py-3 text-text-secondary-dark hover:text-primary hover:bg-background-dark rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined sidebar-icon">public</span>
                Kembali ke Site
            </a>
        </nav>

        <!-- User & Logout -->
        <div class="p-4 border-t border-component-background-dark">
            <div class="flex items-center space-x-3 mb-4 p-3 bg-background-dark rounded-xl">
                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                    <span class="text-white text-sm font-bold">A</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-text-primary-dark text-sm font-medium truncate">Admin User</p>
                    <p class="text-text-secondary-dark text-xs">Administrator</p>
                </div>
            </div>
            <a href="<?= base_url('/auth/logout') ?>" class="flex items-center px-4 py-3 text-error hover:bg-error/10 rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined sidebar-icon">logout</span>
                Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="bg-component-background-dark border-b border-component-background-dark px-8 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-text-primary-dark">Kelola Produk</h1>
                    <p class="text-text-secondary-dark">Kelola produk dan inventaris kamera</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-xl font-semibold flex items-center space-x-2 transition-all duration-300">
                        <span class="material-symbols-outlined text-sm">add</span>
                        <span>Tambah Produk</span>
                    </button>
                    <div class="bg-background-dark px-4 py-2 rounded-xl border border-component-background-dark">
                        <p class="text-text-primary-dark text-sm font-medium"><?= date('l, d F Y') ?></p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto p-8">
            <!-- Success Message -->
            <div class="bg-success/10 border border-success/20 text-success px-6 py-4 rounded-xl mb-6 flex items-center">
                <span class="material-symbols-outlined mr-3">check_circle</span>
                Halaman Produk Berhasil Diakses! Route berfungsi dengan baik.
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($produk as $item): ?>
                    <div class="bg-component-background-dark rounded-xl border border-component-background-dark overflow-hidden hover:border-primary/30 transition-all duration-300 group">
                        <div class="relative">
                            <img src="https://via.placeholder.com/300x200/1E293B/94A3B8?text=Product+Image" 
                                 alt="<?= esc($item['nama_produk']) ?>" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-3 right-3 flex space-x-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $item['stok'] <= 5 ? 'bg-warning/10 text-warning' : 'bg-success/10 text-success' ?>">
                                    Stok: <?= $item['stok'] ?>
                                </span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $item['status'] == 'active' ? 'bg-success/10 text-success' : 'bg-error/10 text-error' ?>">
                                    <?= $item['status'] == 'active' ? 'Aktif' : 'Nonaktif' ?>
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-4">
                            <h3 class="font-semibold text-text-primary-dark mb-1"><?= esc($item['nama_produk']) ?></h3>
                            <p class="text-text-secondary-dark text-sm mb-2"><?= esc($item['nama_kategori']) ?></p>
                            <p class="text-primary font-bold text-lg mb-3">Rp <?= number_format($item['harga_sewa'], 0, ',', '.') ?>/hari</p>
                            <p class="text-text-secondary-dark text-sm mb-4"><?= esc($item['deskripsi']) ?></p>
                            
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-500/10 hover:bg-blue-500/20 text-blue-400 py-2 px-3 rounded-lg text-sm font-medium flex items-center justify-center space-x-1 transition-all duration-300">
                                    <span class="material-symbols-outlined text-sm">edit</span>
                                    <span>Edit</span>
                                </button>
                                <button class="flex-1 bg-error/10 hover:bg-error/20 text-error py-2 px-3 rounded-lg text-sm font-medium flex items-center justify-center space-x-1 transition-all duration-300">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Debug Info -->
            <div class="mt-8 p-6 bg-component-background-dark rounded-xl border border-component-background-dark">
                <h3 class="text-lg font-semibold text-text-primary-dark mb-4">Debug Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-text-secondary-dark">Current URL: <span class="text-text-primary-dark"><?= current_url() ?></span></p>
                        <p class="text-text-secondary-dark">Base URL: <span class="text-text-primary-dark"><?= base_url() ?></span></p>
                    </div>
                    <div>
                        <p class="text-text-secondary-dark">Jumlah Produk: <span class="text-text-primary-dark"><?= count($produk) ?></span></p>
                        <p class="text-text-secondary-dark">Jumlah Kategori: <span class="text-text-primary-dark"><?= count($kategori) ?></span></p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>