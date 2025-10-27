<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= esc($title ?? 'Portofolio') ?> - PRORENTAL</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#00BFFF",
                        "background-dark": "#0A192F",
                        "card-dark": "#1D2A43",
                        "accent": "#64FFDA",
                        "text-primary": "#E6F1FF",
                        "text-secondary": "#8892B0"
                    },
                    fontFamily: {
                        display: ["Space Grotesk", "sans-serif"]
                    },
                },
            },
        }
    </script>
</head>
<body class="bg-background-dark font-display text-text-secondary">

<!-- Wrapper -->
<div class="flex flex-col min-h-screen">

<!-- HEADER -->
<header class="flex items-center justify-between border-b border-card-dark px-6 py-4 sticky top-0 bg-background-dark/80 backdrop-blur-md z-10">
    <div class="flex items-center gap-3 text-text-primary">
        <div class="text-primary size-6">
            <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48..."/></svg>
        </div>
        <h2 class="text-xl font-bold">PRO<span class="text-primary">RENTAL</span></h2>
    </div>

    <nav class="hidden md:flex gap-8 text-base font-medium">
        <a href="<?= base_url('/') ?>" class="hover:text-primary transition">Beranda</a>
        <a href="<?= base_url('/katalog') ?>" class="hover:text-primary transition">Katalog</a>
        <a href="<?= base_url('/porto') ?>" class="text-primary font-bold">Portofolio</a>
        <a href="<?= base_url('/') ?>#keunggulan" class="hover:text-primary transition">Fitur Premium</a>
    </nav>

    <div class="flex items-center gap-3">
        <a href="<?= base_url('/auth/login') ?>" class="px-4 py-2 border border-primary text-primary rounded-full hover:bg-primary/20 text-sm font-semibold">Masuk</a>
        <a href="<?= base_url('/auth/register') ?>" class="px-4 py-2 bg-primary text-background-dark rounded-full hover:bg-accent text-sm font-semibold">Daftar</a>
    </div>
</header>

<!-- MAIN CONTENT -->
<main class="flex-1 px-6 py-12">
    <div class="max-w-6xl mx-auto text-center mb-16">
        <h1 class="text-text-primary text-4xl font-black mb-4">
            Portofolio <span class="text-primary">Kami</span>
        </h1>
        <p class="text-text-secondary text-lg max-w-2xl mx-auto">
            Lihat hasil nyata dari penggunaan layanan kami — mulai dari jepretan kamera, sewa studio, hingga alat streaming.
        </p>
    </div>

    <!-- MENU PORTOFOLIO -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <!-- Hasil Jepretan Kamera -->
        <div class="bg-card-dark rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/20 transition-all">
            <img src="https://placehold.co/600x400/1D2A43/00BFFF?text=Hasil+Kamera" class="w-full aspect-video object-cover" alt="Hasil Jepretan Kamera">
            <div class="p-6">
                <h3 class="text-text-primary text-xl font-bold mb-2">Hasil Jepretan Kamera</h3>
                <p class="text-text-secondary mb-4">Dokumentasi hasil dari kamera dan lensa profesional yang disewa oleh pelanggan kami.</p>
                <a href="#" class="inline-flex items-center justify-center rounded-lg h-10 px-6 bg-primary text-background-dark font-bold hover:bg-accent transition">
                    Lihat Galeri
                </a>
            </div>
        </div>

        <!-- Hasil Sewa Studio -->
        <div class="bg-card-dark rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/20 transition-all">
            <img src="https://placehold.co/600x400/1D2A43/00BFFF?text=Sewa+Studio" class="w-full aspect-video object-cover" alt="Hasil Sewa Studio">
            <div class="p-6">
                <h3 class="text-text-primary text-xl font-bold mb-2">Hasil Sewa Studio</h3>
                <p class="text-text-secondary mb-4">Berbagai hasil produksi foto dan video yang dilakukan di studio PRORENTAL.</p>
                <a href="#" class="inline-flex items-center justify-center rounded-lg h-10 px-6 bg-primary text-background-dark font-bold hover:bg-accent transition">
                    Lihat Galeri
                </a>
            </div>
        </div>

        <!-- Hasil Penyewaan Alat Streaming -->
        <div class="bg-card-dark rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/20 transition-all">
            <img src="https://placehold.co/600x400/1D2A43/00BFFF?text=Alat+Streaming" class="w-full aspect-video object-cover" alt="Hasil Penyewaan Alat Streaming">
            <div class="p-6">
                <h3 class="text-text-primary text-xl font-bold mb-2">Hasil Penyewaan Alat Streaming</h3>
                <p class="text-text-secondary mb-4">Rekaman dan cuplikan hasil siaran langsung menggunakan alat streaming kami.</p>
                <a href="#" class="inline-flex items-center justify-center rounded-lg h-10 px-6 bg-primary text-background-dark font-bold hover:bg-accent transition">
                    Lihat Galeri
                </a>
            </div>
        </div>
    </div>
</main>

<!-- FOOTER -->
<footer class="mt-16 border-t border-card-dark px-6 py-8 text-center text-sm text-text-secondary">
    <p>&copy; <?= date('Y') ?> PRORENTAL. Semua Hak Dilindungi.</p>
</footer>

</div>
</body>
</html>
