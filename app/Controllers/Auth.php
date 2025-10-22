<?php
namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function login()
    {
        // Jika sudah login, redirect ke home
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

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

        // Load model manually
        $userModel = new \App\Models\UserModel();

        // Cek user exists
        $user = $userModel->getUserByEmail($email);

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Email atau password salah');
        }

        // Verify password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Email atau password salah');
        }

        // Check if user is verified
        if (!$user['is_verified']) {
            return redirect()->back()->withInput()->with('error', 'Akun belum diverifikasi. Silakan hubungi admin.');
        }

        // Set session
        $sessionData = [
            'isLoggedIn' => true,
            'id' => $user['id'],
            'nama' => $user['nama'],
            'email' => $user['email'],
            'role' => $user['role'],
            'telepon' => $user['telepon']
        ];

        session()->set($sessionData);

        // Redirect based on role
        if ($user['role'] === 'admin') {
            return redirect()->to('/admin/dashboard')->with('success', 'Selamat datang, ' . $user['nama'] . '!');
        } else {
            return redirect()->to('/')->with('success', 'Selamat datang, ' . $user['nama'] . '!');
        }
    }

    public function register()
    {
        // Jika sudah login, redirect ke home
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Daftar Akun - PRORENTAL'
        ];

        return view('auth/register', $data);
    }

//    public function attemptRegister()
//    {
//        if (!$this->request->is('post')) {
//            return redirect()->back();
//        }
//
//        $data = $this->request->getPost();
//
//        // Validasi manual
//        $errors = [];
//
//        if (empty($data['nama'])) {
//            $errors[] = 'Nama lengkap harus diisi';
//        }
//
//        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
//            $errors[] = 'Format email tidak valid';
//        }
//
//        if (empty($data['password']) || strlen($data['password']) < 6) {
//            $errors[] = 'Password minimal 6 karakter';
//        }
//
//        if ($data['password'] !== $data['confirm_password']) {
//            $errors[] = 'Konfirmasi password tidak sama';
//        }
//
//        if (empty($data['telepon']) || strlen($data['telepon']) < 10) {
//            $errors[] = 'Nomor telepon minimal 10 digit';
//        }
//
//        if (empty($data['alamat']) || strlen($data['alamat']) < 10) {
//            $errors[] = 'Alamat minimal 10 karakter';
//        }
//
//        if (!empty($errors)) {
//            return redirect()->back()->withInput()->with('errors', $errors);
//        }
//
//        // Load model
//        $userModel = new \App\Models\UserModel();
//
//        // Cek email sudah ada
//        if ($userModel->isEmailExist($data['email'])) {
//            return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar');
//        }
//
//        // Prepare user data
//        $userData = [
//            'nama' => $data['nama'],
//            'email' => $data['email'],
//            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
//            'telepon' => $data['telepon'],
//            'alamat' => $data['alamat'],
//            'role' => 'customer',
//            'is_verified' => 1 // Auto verify untuk demo
//        ];
//
//        // Save user
//        if ($userModel->save($userData)) {
//            // Get the new user data
//            $user = $userModel->getUserByEmail($data['email']);
//
//            // Auto login after registration
//            $sessionData = [
//                'isLoggedIn' => true,
//                'id' => $user['id'],
//                'nama' => $user['nama'],
//                'email' => $user['email'],
//                'role' => $user['role'],
//                'telepon' => $user['telepon']
//            ];
//
//            session()->set($sessionData);
//
//            return redirect()->to('/')->with('success', 'Registrasi berhasil! Selamat datang, ' . $user['nama'] . '!');
//        } else {
//            return redirect()->back()->withInput()->with('error', 'Gagal membuat akun. Silakan coba lagi.');
//        }
//    }

    public function attemptRegister()
    {
        $db = \Config\Database::connect();

        try {
            $data = $this->request->getPost();

            $userData = [
                'nama' => $data['nama'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'telepon' => $data['telepon'],
                'alamat' => $data['alamat'],
                'role' => 'customer',
                'is_verified' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $builder = $db->table('users');
            $result = $builder->insert($userData);

            if ($result) {
                echo "SUCCESS - User ID: " . $db->insertID();
            } else {
                echo "ERROR: " . print_r($db->error(), true);
            }

        } catch (\Exception $e) {
            echo "EXCEPTION: " . $e->getMessage();
        }
    }

    public function logout()
    {
        // Destroy session
        session()->destroy();

        return redirect()->to('/')->with('success', 'Logout berhasil!');
    }
}