<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#A0522D',
                        'light-bg': '#ffffff',
                        'light-section': '#FCF8F5',
                        'text-dark': '#2C1F1D',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    </style>
</head>
<body class="bg-light-bg text-text-dark font-sans antialiased">

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div>
            <div class="text-center">
                <a href="<?= base_url('/') ?>" class="text-4xl font-extrabold tracking-tighter text-text-dark">
                    <span class="text-primary font-bold">PRO</span>RENTAL
                </a>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Daftar Akun Baru
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Atau
                <a href="<?= base_url('/auth/login') ?>" class="font-medium text-primary hover:text-opacity-80">
                    masuk ke akun yang sudah ada
                </a>
            </p>
        </div>

        <!-- Alert Messages -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Register Form -->
        <form class="mt-8 space-y-6" action="<?= base_url('/auth/attemptRegister') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="space-y-4">
                <!-- Nama Lengkap -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input id="nama" name="nama" type="text" autocomplete="name" required
                           class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                           placeholder="Masukkan nama lengkap"
                           value="<?= old('nama') ?>">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                           class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                           placeholder="Masukkan alamat email"
                           value="<?= old('email') ?>">
                </div>

                <!-- Telepon -->
                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input id="telepon" name="telepon" type="tel" autocomplete="tel" required
                           class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                           placeholder="Contoh: 081234567890"
                           value="<?= old('telepon') ?>">
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="3" required
                              class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                              placeholder="Masukkan alamat lengkap"><?= old('alamat') ?></textarea>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required
                           class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                           placeholder="Minimal 6 karakter">
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input id="confirm_password" name="confirm_password" type="password" autocomplete="new-password" required
                           class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                           placeholder="Ulangi password">
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="flex items-center">
                <input id="agree_terms" name="agree_terms" type="checkbox" required
                       class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                <label for="agree_terms" class="ml-2 block text-sm text-gray-900">
                    Saya menyetujui
                    <a href="#" class="text-primary hover:text-opacity-80">Syarat & Ketentuan</a>
                    dan
                    <a href="#" class="text-primary hover:text-opacity-80">Kebijakan Privasi</a>
                </label>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition duration-300">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-primary group-hover:text-opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </span>
                    Daftar Sekarang
                </button>
            </div>
        </form>

        <!-- Back to Home -->
        <div class="text-center">
            <a href="<?= base_url('/') ?>" class="text-sm text-gray-600 hover:text-primary transition duration-300">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<script>
    // Real-time password confirmation check
    document.getElementById('confirm_password').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmPassword = this.value;

        if (confirmPassword && password !== confirmPassword) {
            this.classList.add('border-red-300');
            this.classList.remove('border-gray-300');
        } else {
            this.classList.remove('border-red-300');
            this.classList.add('border-gray-300');
        }
    });
</script>

</body>
</html>