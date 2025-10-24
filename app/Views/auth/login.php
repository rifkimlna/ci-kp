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
                        "DEFAULT": "0.5rem",
                        "lg": "0.75rem",
                        "xl": "1rem",
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
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        
        <!-- Header -->
        <div>
            <div class="text-center">
                <a href="<?= base_url('/') ?>" class="flex items-center justify-center gap-3 text-text-primary mb-6">
                    <div class="size-8 text-primary">
                        <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93L15 8h-3V3.07zM15 10h3l1.87 2.07c.13.87.23 1.77.23 2.68 0 1.93-.68 3.68-1.85 5.06L15 16h-3v-6zm2 8.93c-1.12.54-2.31.87-3.59.93L17 14h3c-.59 1.94-1.96 3.56-3.79 4.54l-1.21-1.61z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold">PRO<span class="text-primary">RENTAL</span></span>
                </a>
            </div>
            <h2 class="mt-6 text-center text-3xl font-black text-text-primary">
                Masuk ke Akun Anda
            </h2>
            <p class="mt-3 text-center text-text-secondary">
                Atau
                <a href="<?= base_url('/auth/register') ?>" class="font-semibold text-primary hover:text-accent transition-colors">
                    daftar akun baru
                </a>
            </p>
        </div>

        <!-- Alert Messages -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-500/20 border border-red-500/50 text-red-300 px-4 py-3 rounded-lg" role="alert">
                <div class="flex items-center">
                    <span class="material-symbols-outlined mr-2 text-sm">error</span>
                    <span class="text-sm"><?= session()->getFlashdata('error') ?></span>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-500/20 border border-red-500/50 text-red-300 px-4 py-3 rounded-lg" role="alert">
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

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-accent/20 border border-accent/50 text-accent px-4 py-3 rounded-lg" role="alert">
                <div class="flex items-center">
                    <span class="material-symbols-outlined mr-2 text-sm">check_circle</span>
                    <span class="text-sm"><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form class="mt-8 space-y-6" action="<?= base_url('/auth/attemptLogin') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="space-y-4">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-text-primary mb-2">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-text-secondary text-lg">email</span>
                        </div>
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="block w-full pl-10 pr-3 py-3 bg-card-dark border border-text-secondary/30 rounded-lg text-text-primary placeholder-text-secondary/60 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                               placeholder="masukkan email anda"
                               value="<?= old('email') ?>">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-text-primary mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-text-secondary text-lg">lock</span>
                        </div>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="block w-full pl-10 pr-3 py-3 bg-card-dark border border-text-secondary/30 rounded-lg text-text-primary placeholder-text-secondary/60 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                               placeholder="masukkan password anda">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="group relative w-full flex justify-center items-center py-3 px-4 border border-transparent text-base font-bold rounded-lg text-background-dark bg-primary hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-300 shadow-lg hover:shadow-primary/25">
                    <span class="flex items-center">
                        <span class="material-symbols-outlined mr-2 text-lg">login</span>
                        Masuk ke Akun
                    </span>
                </button>
            </div>

            <!-- Demo Accounts -->
            <div class="mt-6 bg-primary/10 border border-primary/30 rounded-xl p-4">
                <h3 class="text-sm font-semibold text-primary mb-3 flex items-center">
                    <span class="material-symbols-outlined mr-2 text-base">info</span>
                    Akun Demo:
                </h3>
                <div class="text-xs space-y-2">
                    <div class="flex justify-between items-center p-2 bg-background-dark/50 rounded-lg">
                        <span class="text-text-primary font-medium">Admin:</span>
                        <div class="text-text-secondary text-right">
                            <div>admin@prorental.com</div>
                            <div class="text-accent">admin123</div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center p-2 bg-background-dark/50 rounded-lg">
                        <span class="text-text-primary font-medium">Customer:</span>
                        <div class="text-text-secondary text-right">
                            <div>customer@test.com</div>
                            <div class="text-accent">user123</div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Back to Home -->
        <div class="text-center pt-6">
            <a href="<?= base_url('/') ?>" class="inline-flex items-center text-sm text-text-secondary hover:text-primary transition-colors group">
                <span class="material-symbols-outlined mr-1 text-base group-hover:-translate-x-1 transition-transform">arrow_back</span>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<!-- Background Decoration -->
<div class="fixed inset-0 -z-10 overflow-hidden">
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-primary/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-accent/10 rounded-full blur-3xl"></div>
</div>

</body>
</html>