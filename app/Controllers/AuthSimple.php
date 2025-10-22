<?php
namespace App\Controllers;

class AuthSimple extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Login - PRORENTAL'
        ];

        return view('auth/login', $data);
    }

    public function attemptLogin()
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validasi input
        if (empty($email) || empty($password)) {
            return redirect()->back()->withInput()->with('error', 'Email dan password harus diisi');
        }

        // Load model
        $userModel = new \App\Models\UserModel();

        // Cek user exists di database
        $user = $userModel->getUserByEmail($email);

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Email atau password salah');
        }

        // Verify password - untuk user demo gunakan password plain, untuk user database gunakan password_verify
        $isValidPassword = false;

        // Cek jika user adalah demo account (password masih plain text)
        $demoAccounts = [
            'admin@prorental.com' => 'admin123',
            'customer@test.com' => 'user123'
        ];

        if (isset($demoAccounts[$email])) {
            // Untuk demo account, bandingkan password plain text
            $isValidPassword = ($demoAccounts[$email] === $password);
        } else {
            // Untuk user dari database, gunakan password_verify
            $isValidPassword = password_verify($password, $user['password']);
        }

        if (!$isValidPassword) {
            return redirect()->back()->withInput()->with('error', 'Email atau password salah');
        }

        // Check if user is verified (jika ada kolom is_verified)
        if (isset($user['is_verified']) && !$user['is_verified']) {
            return redirect()->back()->withInput()->with('error', 'Akun belum diverifikasi. Silakan hubungi admin.');
        }

        // Set session
        $sessionData = [
            'isLoggedIn' => true,
            'id' => $user['id'],
            'nama' => $user['nama'],
            'email' => $user['email'],
            'role' => $user['role'],
            'telepon' => $user['telepon'] ?? ''
        ];

        session()->set($sessionData);

        // Redirect based on role
        if ($user['role'] === 'admin') {
            return redirect()->to('/admin')->with('success', 'Login berhasil! Selamat datang, ' . $user['nama'] . '!');
        } else {
            return redirect()->to('/')->with('success', 'Login berhasil! Selamat datang, ' . $user['nama'] . '!');
        }
    }

//            return redirect()->to('/')->with('success', 'Login berhasil! Selamat datang, ' . $user['nama'] . '!');
//        }
//
//        return redirect()->back()->withInput()->with('error', 'Email atau password salah');
//    }

    public function register()
    {
        $data = [
            'title' => 'Daftar Akun - PRORENTAL'
        ];

        return view('auth/register', $data);
    }

    public function attemptRegister()
    {
        if (!$this->request->is('post')) {
            return redirect()->back()->with('error', 'Method tidak diizinkan');
        }

        $db = \Config\Database::connect();

        try {
            $data = $this->request->getPost();

            // Validasi sederhana
            if (empty($data['nama']) || empty($data['email']) || empty($data['password'])) {
                return redirect()->back()->withInput()->with('error', 'Nama, email dan password harus diisi');
            }

            if ($data['password'] !== $data['confirm_password']) {
                return redirect()->back()->withInput()->with('error', 'Konfirmasi password tidak sama');
            }

            // Cek email sudah ada
            $existing = $db->table('users')->where('email', $data['email'])->countAllResults();
            if ($existing > 0) {
                return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar');
            }

            // Prepare data
            $userData = [
                'nama' => $data['nama'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'telepon' => $data['telepon'] ?? '',
                'alamat' => $data['alamat'] ?? '',
                'role' => 'customer',
                'is_verified' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Insert langsung ke database
            $result = $db->table('users')->insert($userData);

            if (!$result) {
                $error = $db->error();
                log_message('error', 'Database error: ' . print_r($error, true));
                return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data ke database');
            }

            $user_id = $db->insertID();

            // Auto login
            $sessionData = [
                'isLoggedIn' => true,
                'id' => $user_id,
                'nama' => $data['nama'],
                'email' => $data['email'],
                'role' => 'customer',
                'telepon' => $data['telepon'] ?? ''
            ];

            session()->set($sessionData);

            return redirect()->to('/')->with('success', 'Registrasi berhasil! Selamat datang, ' . $data['nama'] . '!');

        } catch (\Exception $e) {
            log_message('error', 'Registration error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Logout berhasil!');
    }
}