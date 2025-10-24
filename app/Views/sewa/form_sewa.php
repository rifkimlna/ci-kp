<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Form Penyewaan - <?= esc($product['nama_produk'] ?? 'Produk') ?></title>
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
                        "error": "#F87171"
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

<main class="flex-1 p-4 md:p-6 lg:p-10">
    <!-- Breadcrumb -->
    <div class="flex flex-wrap gap-2 mb-8">
        <a class="text-text-secondary hover:text-primary text-sm font-medium leading-normal transition-colors" href="<?= base_url('/') ?>">Beranda</a>
        <span class="text-text-secondary text-sm font-medium leading-normal">/</span>
        <a class="text-text-secondary hover:text-primary text-sm font-medium leading-normal transition-colors" href="<?= base_url('/katalog') ?>">Katalog</a>
        <span class="text-text-secondary text-sm font-medium leading-normal">/</span>
        <a class="text-text-secondary hover:text-primary text-sm font-medium leading-normal transition-colors" href="<?= base_url('/produk/' . $product['id']) ?>"><?= esc($product['nama_produk']) ?></a>
        <span class="text-text-secondary text-sm font-medium leading-normal">/</span>
        <span class="text-text-primary text-sm font-medium leading-normal">Form Penyewaan</span>
    </div>

    <div class="flex min-w-72 flex-col gap-2 mb-8">
        <p class="text-text-primary text-4xl font-black leading-tight tracking-[-0.033em]">Formulir Pemesanan</p>
        <p class="text-text-secondary text-base font-normal leading-normal">Silakan isi formulir di bawah ini untuk menyewa <?= esc($product['nama_produk']) ?>.</p>
    </div>

    <!-- Alert Messages -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-error/20 border border-error/50 text-error px-4 py-3 rounded-lg mb-6">
            <div class="flex items-center">
                <span class="material-symbols-outlined mr-2 text-sm">error</span>
                <span class="text-sm"><?= session()->getFlashdata('error') ?></span>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="bg-error/20 border border-error/50 text-error px-4 py-3 rounded-lg mb-6">
            <div class="flex items-start">
                <span class="material-symbols-outlined mr-2 text-sm mt-0.5">error</span>
                <div class="text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Section -->
        <div class="lg:col-span-2 flex flex-col gap-8">
            <form method="post" action="<?= base_url('/sewa/process') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="produk_id" value="<?= $product['id'] ?>">

                <!-- Date & Duration Section -->
                <div class="bg-card-dark p-6 rounded-lg">
                    <h2 class="text-text-primary text-[22px] font-bold leading-tight tracking-[-0.015em] mb-4">Pilih Tanggal Sewa</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="flex flex-col">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Tanggal Sewa</p>
                            <input type="date" name="tanggal_sewa"
                                   min="<?= date('Y-m-d') ?>"
                                   class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark h-14 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal"
                                   required>
                        </label>

                        <label class="flex flex-col">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Tanggal Kembali</p>
                            <input type="date" name="tanggal_kembali"
                                   min="<?= date('Y-m-d', strtotime('+1 day')) ?>"
                                   class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark h-14 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal"
                                   required>
                        </label>
                    </div>

                    <div class="mt-4">
                        <label class="flex flex-col">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Durasi Sewa</p>
                            <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark h-14 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal" 
                                   id="durasi_sewa" 
                                   disabled 
                                   value="Pilih tanggal untuk menghitung durasi"/>
                        </label>
                    </div>

                    <div class="mt-4">
                        <label class="flex flex-col">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Jumlah Unit</p>
                            <input type="number" name="jumlah"
                                   min="1" max="<?= $product['stok'] ?>"
                                   value="1"
                                   class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark h-14 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal"
                                   required>
                            <p class="text-text-secondary text-xs mt-1">Maksimal: <?= $product['stok'] ?> unit tersedia</p>
                        </label>
                    </div>
                </div>

                <!-- Contact Info Section -->
                <div class="bg-card-dark p-6 rounded-lg">
                    <h2 class="text-text-primary text-[22px] font-bold leading-tight tracking-[-0.015em] mb-4">Informasi Kontak</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="flex flex-col">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Nama Lengkap</p>
                            <input type="text" name="nama_pemesan"
                                   value="<?= session()->get('nama') ?? '' ?>"
                                   class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark h-14 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal"
                                   placeholder="Masukkan nama lengkap"
                                   required>
                        </label>

                        <label class="flex flex-col">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Nomor Telepon</p>
                            <input type="tel" name="telepon"
                                   value="<?= session()->get('telepon') ?? '' ?>"
                                   class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark h-14 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal"
                                   placeholder="081234567890"
                                   required>
                        </label>

                        <label class="flex flex-col md:col-span-2">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Alamat Email</p>
                            <input type="email" name="email"
                                   value="<?= session()->get('email') ?? '' ?>"
                                   class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark h-14 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal"
                                   placeholder="email@example.com"
                                   required>
                        </label>
                    </div>
                </div>

                <!-- Shipping & Payment Info Section -->
                <div class="bg-card-dark p-6 rounded-lg">
                    <h2 class="text-text-primary text-[22px] font-bold leading-tight tracking-[-0.015em] mb-4">Alamat & Pembayaran</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <label class="flex flex-col md:col-span-2">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Alamat Lengkap</p>
                            <textarea name="alamat_pengiriman" rows="3"
                                      class="form-textarea flex w-full min-w-0 flex-1 resize-y overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark min-h-28 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal"
                                      placeholder="Jl. Sudirman No. 123, Jakarta Pusat"
                                      required><?= session()->get('alamat') ?? '' ?></textarea>
                        </label>

                        <label class="flex flex-col">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Kota</p>
                            <input type="text" name="kota"
                                   class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark h-14 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal"
                                   placeholder="Jakarta"
                                   required>
                        </label>

                        <label class="flex flex-col">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Kode Pos</p>
                            <input type="text" name="kode_pos"
                                   class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark h-14 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal"
                                   placeholder="12345"
                                   required>
                        </label>
                    </div>

                    <div class="mt-4">
                        <label class="flex flex-col">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Metode Pembayaran</p>
                            <select name="metode_pembayaran" 
                                    class="form-select flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark h-14 p-[15px] text-base font-normal leading-normal"
                                    required>
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="transfer_bank">Transfer Bank</option>
                                <option value="qris">QRIS</option>
                                <option value="cod">Cash on Delivery</option>
                            </select>
                        </label>
                    </div>

                    <div class="mt-4">
                        <label class="flex flex-col">
                            <p class="text-text-primary text-base font-medium leading-normal pb-2">Catatan (Opsional)</p>
                            <textarea name="catatan" rows="3"
                                      class="form-textarea flex w-full min-w-0 flex-1 resize-y overflow-hidden rounded-lg text-text-primary focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-card-dark bg-background-dark min-h-28 placeholder:text-text-secondary p-[15px] text-base font-normal leading-normal"
                                      placeholder="Catatan tambahan untuk penyewaan..."></textarea>
                        </label>
                    </div>
                </div>

                <button type="submit"
                        class="w-full flex min-w-[84px] max-w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-primary text-background-dark text-base font-bold leading-normal tracking-[0.015em] hover:bg-accent transition-colors mt-6">
                    <span class="truncate">Konfirmasi Pesanan</span>
                </button>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-card-dark p-6 rounded-lg sticky top-10">
                <h2 class="text-text-primary text-[22px] font-bold leading-tight tracking-[-0.015em] pb-4 border-b border-background-dark">Ringkasan Pesanan</h2>
                
                <div class="mt-4 space-y-4">
                    <!-- Product Info -->
                    <div class="flex items-center gap-4">
                        <img src="<?= base_url('uploads/products/' . esc($product['gambar'])) ?>"
                             alt="<?= esc($product['nama_produk']) ?>"
                             class="w-16 h-16 rounded-lg object-cover"
                             onerror="this.src='https://placehold.co/100x100/1D2A43/00BFFF?text=<?= urlencode($product['nama_produk']) ?>'">
                        <div>
                            <p class="text-text-primary font-medium"><?= esc($product['nama_produk']) ?></p>
                            <p class="text-text-secondary text-sm">Rp <?= number_format($product['harga_per_hari'], 0, ',', '.') ?>/hari</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-text-secondary text-sm">Periode Sewa</p>
                        <p class="text-text-primary font-medium" id="periode_sewa">Pilih tanggal</p>
                    </div>

                    <div>
                        <p class="text-text-secondary text-sm">Durasi</p>
                        <p class="text-text-primary font-medium" id="display_durasi">-</p>
                    </div>

                    <div>
                        <p class="text-text-secondary text-sm">Jumlah Unit</p>
                        <p class="text-text-primary font-medium" id="display_jumlah">1 unit</p>
                    </div>

                    <div class="pt-4 border-t border-background-dark space-y-2">
                        <div class="flex justify-between">
                            <p class="text-text-secondary">Sewa per hari</p>
                            <p class="text-text-primary" id="harga_per_hari">Rp <?= number_format($product['harga_per_hari'], 0, ',', '.') ?></p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-text-secondary">Total Biaya Sewa</p>
                            <p class="text-text-primary" id="total_biaya">Rp 0</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-text-secondary">Deposit (50%)</p>
                            <p class="text-text-primary" id="deposit">Rp 0</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-background-dark">
                        <div class="flex justify-between items-center">
                            <p class="text-text-primary text-lg font-bold">Total Bayar</p>
                            <p class="text-primary text-xl font-bold" id="total_bayar">Rp 0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="text-center p-6 border-t border-solid border-card-dark mt-10">
    <p class="text-text-secondary text-sm">&copy; <?= date('Y') ?> PRORENTAL. Semua Hak Dilindungi.</p>
    <div class="flex justify-center gap-4 mt-2">
        <a class="text-text-secondary text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Tentang Kami</a>
        <a class="text-text-secondary text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">FAQ</a>
        <a class="text-text-secondary text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Kontak</a>
    </div>
</footer>

</div>
</div>
</div>
</div>

<script>
    // Calculate rental duration and costs
    function calculateRental() {
        const tanggalSewa = document.querySelector('input[name="tanggal_sewa"]').value;
        const tanggalKembali = document.querySelector('input[name="tanggal_kembali"]').value;
        const jumlah = parseInt(document.querySelector('input[name="jumlah"]').value) || 1;
        const hargaPerHari = <?= $product['harga_per_hari'] ?>;

        if (tanggalSewa && tanggalKembali) {
            const start = new Date(tanggalSewa);
            const end = new Date(tanggalKembali);
            const diffTime = Math.abs(end - start);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            if (diffDays > 0) {
                // Update display
                document.getElementById('durasi_sewa').value = diffDays + ' Hari';
                document.getElementById('display_durasi').textContent = diffDays + ' Hari';
                document.getElementById('periode_sewa').textContent = 
                    formatDate(start) + ' - ' + formatDate(end);
                document.getElementById('display_jumlah').textContent = jumlah + ' unit';

                // Calculate costs
                const totalBiaya = hargaPerHari * diffDays * jumlah;
                const deposit = totalBiaya * 0.5; // 50% deposit
                const totalBayar = deposit;

                // Update cost display
                document.getElementById('total_biaya').textContent = 'Rp ' + formatRupiah(totalBiaya);
                document.getElementById('deposit').textContent = 'Rp ' + formatRupiah(deposit);
                document.getElementById('total_bayar').textContent = 'Rp ' + formatRupiah(totalBayar);
            }
        }
    }

    function formatDate(date) {
        return date.toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'short',
            year: 'numeric'
        });
    }

    function formatRupiah(amount) {
        return amount.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    // Auto calculate return date minimum
    document.querySelector('input[name="tanggal_sewa"]').addEventListener('change', function() {
        const sewaDate = new Date(this.value);
        const kembaliDate = new Date(sewaDate);
        kembaliDate.setDate(kembaliDate.getDate() + 1);

        const minKembali = kembaliDate.toISOString().split('T')[0];
        document.querySelector('input[name="tanggal_kembali"]').min = minKembali;

        // If current return date is before new min date, reset it
        const currentKembali = document.querySelector('input[name="tanggal_kembali"]').value;
        if (currentKembali && new Date(currentKembali) < kembaliDate) {
            document.querySelector('input[name="tanggal_kembali"]').value = minKembali;
        }

        calculateRental();
    });

    document.querySelector('input[name="tanggal_kembali"]').addEventListener('change', calculateRental);
    document.querySelector('input[name="jumlah"]').addEventListener('input', calculateRental);

    // Initial calculation
    calculateRental();
</script>

</body>
</html>