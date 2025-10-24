<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Konfirmasi Pesanan - <?= esc($transaction['kode_transaksi'] ?? 'PRORENTAL') ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script>
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
                        "text-secondary": "#8892B0",
                        "success": "#4ADE80"
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

<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-card-dark px-4 md:px-10 py-3">
    <div class="flex items-center gap-4 text-text-primary">
        <div class="size-6 text-primary">
            <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93L15 8h-3V3.07zM15 10h3l1.87 2.07c.13.87.23 1.77.23 2.68 0 1.93-.68 3.68-1.85 5.06L15 16h-3v-6zm2 8.93c-1.12.54-2.31.87-3.59.93L17 14h3c-.59 1.94-1.96 3.56-3.79 4.54l-1.21-1.61z"></path>
            </svg>
        </div>
        <h1 class="text-text-primary text-xl font-bold leading-tight tracking-[-0.015em]">PRO<span class="text-primary">RENTAL</span></h1>
    </div>
    
    <div class="hidden md:flex flex-1 justify-end items-center gap-8">
        <nav class="flex items-center gap-9">
            <a class="text-text-primary text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= base_url('/') ?>">Beranda</a>
            <a class="text-text-primary text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= base_url('/katalog') ?>">Katalog</a>
            <a class="text-text-primary text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= base_url('/') ?>#keunggulan">Fitur Premium</a>
            <a class="text-text-primary text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= base_url('/') ?>#testimoni">Klien</a>
        </nav>
    </div>
</header>

<main class="flex-1 p-4 md:p-6 lg:p-10 flex items-center justify-center">
    <div class="bg-card-dark p-8 rounded-xl max-w-2xl w-full text-center shadow-lg">
        <!-- Success Alert -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-success/20 border border-success/50 text-success px-4 py-3 rounded-lg mb-6">
                <div class="flex items-center justify-center">
                    <span class="material-symbols-outlined mr-2 text-sm">check_circle</span>
                    <span class="text-sm"><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Success Icon -->
        <div class="flex justify-center items-center mx-auto bg-success/10 rounded-full w-20 h-20 mb-6">
            <span class="material-symbols-outlined text-success text-5xl">check_circle</span>
        </div>
        
        <h1 class="text-3xl font-bold text-text-primary leading-tight tracking-tight">Pesanan Berhasil Dibuat!</h1>
        <p class="text-text-secondary mt-2 mb-6">Terima kasih telah melakukan pemesanan. Silakan lakukan pembayaran untuk mengkonfirmasi pesanan Anda.</p>
        
        <!-- Order Number -->
        <div class="bg-background-dark p-4 rounded-lg text-left mb-6">
            <p class="text-text-secondary">Kode Transaksi</p>
            <p class="text-primary font-bold text-lg"><?= esc($transaction['kode_transaksi'] ?? '-') ?></p>
        </div>

        <div class="border-t border-b border-background-dark divide-y divide-background-dark">
            <!-- Order Summary -->
            <div class="py-4 text-left">
                <h3 class="text-text-primary font-semibold text-lg mb-3">Ringkasan Pesanan</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <p class="text-text-primary">Tanggal Pesan</p>
                        <p class="text-text-secondary"><?= date('d/m/Y H:i', strtotime($transaction['created_at'])) ?></p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-text-primary">Status</p>
                        <span class="font-semibold text-yellow-400">Menunggu Pembayaran</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-text-primary">Metode Pembayaran</p>
                        <p class="text-text-secondary">
                            <?= $transaction['metode_pembayaran'] == 'transfer_bank' ? 'Transfer Bank' : 
                               ($transaction['metode_pembayaran'] == 'qris' ? 'QRIS' : 'Cash on Delivery') ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Items -->
            <div class="py-4 text-left">
                <h3 class="text-text-primary font-semibold text-lg mb-3">Item yang Disewa</h3>
                <?php if (!empty($transaction['details'])): ?>
                    <?php foreach ($transaction['details'] as $detail): ?>
                        <div class="flex items-center gap-3 mb-3 last:mb-0">
                            <img src="<?= base_url('uploads/products/' . esc($detail['gambar'])) ?>"
                                 alt="<?= esc($detail['nama_produk']) ?>"
                                 class="w-12 h-12 rounded object-cover"
                                 onerror="this.src='https://placehold.co/100x100/1D2A43/00BFFF?text=Product'">
                            <div class="flex-1">
                                <p class="text-text-primary font-medium"><?= esc($detail['nama_produk']) ?></p>
                                <p class="text-text-secondary text-sm"><?= $detail['jumlah'] ?> unit × Rp <?= number_format($detail['harga'], 0, ',', '.') ?>/hari</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Rental Schedule -->
            <div class="py-4 text-left">
                <h3 class="text-text-primary font-semibold text-lg mb-3">Jadwal Penyewaan</h3>
                <div class="space-y-2">
                    <div class="flex items-center gap-4 text-text-primary">
                        <span class="material-symbols-outlined text-primary">calendar_today</span>
                        <p>Mulai: <?= date('d F Y', strtotime($transaction['tanggal_sewa'])) ?></p>
                    </div>
                    <div class="flex items-center gap-4 text-text-primary">
                        <span class="material-symbols-outlined text-primary">event_available</span>
                        <p>Selesai: <?= date('d F Y', strtotime($transaction['tanggal_kembali'])) ?></p>
                    </div>
                    <div class="flex items-center gap-4 text-text-primary">
                        <span class="material-symbols-outlined text-primary">schedule</span>
                        <p>Durasi: 
                            <?php 
                                $start = new DateTime($transaction['tanggal_sewa']);
                                $end = new DateTime($transaction['tanggal_kembali']);
                                $diff = $start->diff($end);
                                echo $diff->days . ' Hari';
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Payment Details -->
            <div class="py-4 text-left">
                <h3 class="text-text-primary font-semibold text-lg mb-3">Detail Pembayaran</h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <p class="text-text-secondary">Total Biaya Sewa</p>
                        <p class="text-text-primary">Rp <?= number_format($transaction['total_harga'], 0, ',', '.') ?></p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-text-secondary">Deposit (50%)</p>
                        <p class="text-text-primary">Rp <?= number_format($transaction['total_harga'] * 0.5, 0, ',', '.') ?></p>
                    </div>
                    <div class="flex justify-between items-center pt-2 mt-2 border-t border-background-dark">
                        <p class="text-text-primary text-lg font-bold">Total Pembayaran</p>
                        <p class="text-primary text-xl font-bold">Rp <?= number_format($transaction['total_harga'] * 0.5, 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Instructions -->
        <div class="bg-yellow-400/10 border border-yellow-400/30 rounded-lg p-4 mt-6 text-left">
            <h3 class="font-semibold text-yellow-400 mb-2 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">info</span>
                Instruksi Pembayaran:
            </h3>
            <p class="text-yellow-300 text-sm">
                <?php if ($transaction['metode_pembayaran'] == 'transfer_bank'): ?>
                    Silakan transfer ke rekening BCA 1234567890 a.n. PRORENTAL. Konfirmasi pembayaran via WhatsApp 081234567890.
                <?php elseif ($transaction['metode_pembayaran'] == 'qris'): ?>
                    Scan QR code yang akan dikirim via WhatsApp untuk melakukan pembayaran.
                <?php else: ?>
                    Bayar saat barang diterima. Pastikan menyiapkan uang tunai.
                <?php endif; ?>
            </p>
            <p class="text-yellow-300 text-xs mt-2">Pesanan akan diproses setelah pembayaran dikonfirmasi.</p>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?= base_url('/riwayat') ?>" 
               class="w-full sm:w-auto flex min-w-[84px] max-w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-background-dark text-base font-bold leading-normal tracking-[0.015em] hover:bg-accent transition-colors">
                <span class="material-symbols-outlined mr-2 text-sm">history</span>
                <span class="truncate">Riwayat Sewa</span>
            </a>
            <a href="<?= base_url('/katalog') ?>"
               class="w-full sm:w-auto flex min-w-[84px] max-w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-transparent border border-primary text-primary text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/10 transition-colors">
                <span class="material-symbols-outlined mr-2 text-sm">add_shopping_cart</span>
                <span class="truncate">Sewa Lagi</span>
            </a>
        </div>
    </div>
</main>

<footer class="text-center p-6 border-t border-solid border-card-dark mt-10">
    <p class="text-text-secondary text-sm">&copy; <?= date('Y') ?> PRORENTAL. Semua Hak Dilindungi.</p>
    <div class="flex justify-center gap-4 mt-2">
        <a class="text-text-secondary text-sm font-medium leading-normal hover:text-primary transition-colors" href="<?= base_url('/') ?>#tentang">Tentang Kami</a>
        <a class="text-text-secondary text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">FAQ</a>
        <a class="text-text-secondary text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Kontak</a>
    </div>
</footer>

</div>
</div>
</div>
</div>

</body>
</html>