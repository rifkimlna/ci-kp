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
                        warning: "#FBBF24"
                    },
                    fontFamily: {
                        display: ["Space Grotesk", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
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
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[1200px] flex-1">

<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-component-background-dark px-4 md:px-10 py-3">
    <div class="flex items-center gap-4 text-text-primary-dark">
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
        <h1 class="text-text-primary-dark text-xl font-bold leading-tight tracking-[-0.015em]">Sewa Kamera</h1>
    </div>
    <div class="hidden md:flex flex-1 justify-end items-center gap-8">
        <nav class="flex items-center gap-9">
            <a class="text-text-primary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= base_url('/') ?>">Home</a>
            <a class="text-text-primary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= base_url('/katalog') ?>">Kamera</a>
            <a class="text-text-primary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Tentang Kami</a>
            <a class="text-text-primary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Kontak</a>
        </nav>
        <span class="text-text-primary-dark font-medium">Halo, <?= esc(session()->get('nama')) ?></span>
        <a href="<?= base_url('/auth/logout') ?>" class="bg-primary hover:bg-opacity-90 text-white font-bold py-2.5 px-7 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
            Logout
        </a>
    </div>
</header>

<main class="flex-1 p-4 md:p-6 lg:p-10">
    <?php if (!empty($transaction)): ?>
        <div class="bg-component-background-dark p-8 rounded-xl w-full text-left shadow-lg">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-text-primary-dark leading-tight tracking-tight">Detail Transaksi</h1>
                    <p class="text-text-secondary-dark mt-1">Nomor Pesanan: <span class="text-primary font-semibold"><?= esc($transaction['kode_transaksi']) ?></span></p>
                </div>
                <div class="flex space-x-2 mt-4 md:mt-0">
                    <span class="bg-blue-500/10 text-blue-400 text-sm font-medium me-2 px-3 py-1.5 rounded-full">
                        Pembayaran: <?= ucfirst($transaction['status_pembayaran']) ?>
                    </span>
                    <span class="bg-green-500/10 text-green-400 text-sm font-medium me-2 px-3 py-1.5 rounded-full">
                        Status: <?= str_replace('_', ' ', ucfirst($transaction['status_transaksi'])) ?>
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Items Section -->
                <div>
                    <h3 class="text-text-primary-dark font-semibold text-lg mb-4">Item yang Disewa</h3>
                    <?php if (!empty($transaction['details'])): ?>
                        <div class="space-y-4">
                            <?php foreach ($transaction['details'] as $detail): ?>
                                <div class="bg-background-dark p-4 rounded-lg flex items-start gap-4">
                                    <img src="<?= base_url('uploads/products/' . esc($detail['gambar'])) ?>"
                                         alt="<?= esc($detail['nama_produk']) ?>"
                                         class="w-24 h-24 object-cover rounded-md"
                                         onerror="this.src='https://placehold.co/100x100/1E293B/38BDF8?text=Product'">
                                    <div class="flex-1">
                                        <p class="text-text-primary-dark font-semibold"><?= esc($detail['nama_produk']) ?></p>
                                        <p class="text-text-secondary-dark text-sm"><?= $detail['jumlah'] ?> Unit</p>
                                        <p class="text-text-primary-dark font-bold mt-2">Rp <?= number_format($detail['harga'], 0, ',', '.') ?> / hari</p>
                                        <p class="text-text-secondary-dark text-sm mt-1">Subtotal: Rp <?= number_format($detail['subtotal'], 0, ',', '.') ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Rental Period -->
                <div>
                    <h3 class="text-text-primary-dark font-semibold text-lg mb-4">Periode Sewa</h3>
                    <div class="bg-background-dark p-4 rounded-lg space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">calendar_today</span>
                            <div>
                                <p class="text-text-secondary-dark text-sm">Tanggal Sewa</p>
                                <p class="text-text-primary-dark"><?= date('d M Y', strtotime($transaction['tanggal_sewa'])) ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">event_available</span>
                            <div>
                                <p class="text-text-secondary-dark text-sm">Tanggal Pengembalian</p>
                                <p class="text-text-primary-dark"><?= date('d M Y', strtotime($transaction['tanggal_kembali'])) ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">schedule</span>
                            <div>
                                <p class="text-text-secondary-dark text-sm">Lama Sewa</p>
                                <p class="text-text-primary-dark"><?= $transaction['lama_sewa'] ?> Hari</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Information -->
                <div>
                    <h3 class="text-text-primary-dark font-semibold text-lg mb-4">Informasi Pembayaran</h3>
                    <div class="bg-background-dark p-4 rounded-lg">
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <p class="text-text-secondary-dark">Total Biaya Sewa (<?= $transaction['lama_sewa'] ?> hari)</p>
                                <p class="text-text-primary-dark">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></p>
                            </div>
                            <div class="flex justify-between items-center pt-3 mt-3 border-t border-component-background-dark">
                                <p class="text-text-primary-dark text-lg font-bold">Total Pembayaran</p>
                                <p class="text-primary text-xl font-bold">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></p>
                            </div>
                            <div class="flex justify-between items-center pt-3 mt-3 border-t border-component-background-dark">
                                <p class="text-text-secondary-dark">Metode Pembayaran</p>
                                <p class="text-text-primary-dark"><?= ucfirst(str_replace('_', ' ', $transaction['metode_pembayaran'])) ?></p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-text-secondary-dark">Status Pembayaran</p>
                                <p class="<?= $transaction['status_pembayaran'] == 'paid' ? 'text-success' : 'text-warning' ?> font-semibold">
                                    <?= ucfirst($transaction['status_pembayaran']) ?>
                                </p>
                            </div>
                        </div>

                        <?php if ($transaction['status_pembayaran'] == 'pending'): ?>
                            <div class="mt-4 p-4 bg-yellow-500/10 border border-yellow-500/20 rounded-lg">
                                <p class="text-yellow-400 text-sm">
                                    <strong>Silakan lakukan pembayaran:</strong><br>
                                    Transfer ke BCA 1234567890 a.n. PRORENTAL
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Order Timeline -->
                <div>
                    <h3 class="text-text-primary-dark font-semibold text-lg mb-4">Status Pesanan</h3>
                    <div class="bg-background-dark p-4 rounded-lg space-y-4">
                        <!-- Timeline Item 1: Pesanan Dibuat -->
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-success rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-text-primary-dark font-semibold text-sm">Pesanan Dibuat</p>
                                <p class="text-text-secondary-dark text-xs">Pesanan Anda telah berhasil dibuat</p>
                                <p class="text-text-secondary-dark text-xs mt-1"><?= date('d M Y H:i', strtotime($transaction['created_at'])) ?></p>
                            </div>
                        </div>

                        <!-- Timeline Item 2: Pembayaran -->
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 <?= $transaction['status_pembayaran'] == 'paid' ? 'bg-success' : ($transaction['status_pembayaran'] == 'pending' ? 'bg-warning' : 'bg-error') ?> rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <?php if ($transaction['status_pembayaran'] == 'paid'): ?>
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                <?php else: ?>
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <div class="flex-1">
                                <p class="text-text-primary-dark font-semibold text-sm">
                                    <?= $transaction['status_pembayaran'] == 'paid' ? 'Pembayaran Diterima' : 'Menunggu Pembayaran' ?>
                                </p>
                                <p class="text-text-secondary-dark text-xs">
                                    <?= $transaction['status_pembayaran'] == 'paid' ? 'Pembayaran telah dikonfirmasi' : 'Silakan lakukan pembayaran' ?>
                                </p>
                            </div>
                        </div>

                        <!-- Timeline Item 3: Status Transaksi -->
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 <?= in_array($transaction['status_transaksi'], ['diproses', 'dikirim', 'selesai']) ? 'bg-success' : 'bg-warning' ?> rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <?php if (in_array($transaction['status_transaksi'], ['diproses', 'dikirim', 'selesai'])): ?>
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                <?php else: ?>
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <div class="flex-1">
                                <p class="text-text-primary-dark font-semibold text-sm">
                                    <?= str_replace('_', ' ', ucfirst($transaction['status_transaksi'])) ?>
                                </p>
                                <p class="text-text-secondary-dark text-xs">
                                    <?php
                                    $status_messages = [
                                        'menunggu_konfirmasi' => 'Menunggu konfirmasi admin',
                                        'diproses' => 'Pesanan sedang diproses',
                                        'dikirim' => 'Pesanan sedang dikirim',
                                        'selesai' => 'Pesanan telah selesai',
                                        'dibatalkan' => 'Pesanan telah dibatalkan'
                                    ];
                                    echo $status_messages[$transaction['status_transaksi']] ?? 'Status tidak diketahui';
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-end">
                <a href="<?= base_url('/riwayat') ?>" 
                   class="w-full sm:w-auto flex min-w-[84px] max-w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-transparent border border-primary text-primary text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/10 transition-colors">
                    <span class="truncate">Kembali ke Riwayat</span>
                </a>
                
                <?php if ($transaction['status_pembayaran'] == 'pending'): ?>
                    <form method="post" action="<?= base_url('/riwayat/batalkan/' . $transaction['id']) ?>" 
                          onsubmit="return confirm('Yakin ingin membatalkan transaksi ini?')" class="w-full sm:w-auto">
                        <?= csrf_field() ?>
                        <button type="submit"
                                class="w-full flex min-w-[84px] max-w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-transparent border border-error text-error text-base font-bold leading-normal tracking-[0.015em] hover:bg-error/10 transition-colors">
                            <span class="truncate">Batalkan Transaksi</span>
                        </button>
                    </form>
                <?php endif; ?>

                <a href="<?= base_url('/katalog') ?>" 
                   class="w-full sm:w-auto flex min-w-[84px] max-w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                    <span class="truncate">Sewa Lagi</span>
                </a>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-16">
            <p class="text-text-secondary-dark text-lg">Transaksi tidak ditemukan.</p>
            <a href="<?= base_url('/riwayat') ?>" class="text-primary hover:text-opacity-80 font-semibold mt-4 inline-block">
                Kembali ke Riwayat
            </a>
        </div>
    <?php endif; ?>
</main>

<footer class="text-center p-6 border-t border-solid border-component-background-dark mt-10">
    <p class="text-text-secondary-dark text-sm">© 2023 Sewa Kamera. All Rights Reserved.</p>
    <div class="flex justify-center gap-4 mt-2">
        <a class="text-text-secondary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Tentang Kami</a>
        <a class="text-text-secondary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">FAQ</a>
        <a class="text-text-secondary-dark text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Kontak</a>
    </div>
</footer>

</div>
</div>
</div>
</div>
</body>
</html>