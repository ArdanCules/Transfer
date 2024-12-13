<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AuthController extends Controller
{
    protected $session;
    protected $userModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
    }

    public function login()
    {
        // Tampilkan halaman login
        return view('login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Gunakan method getUserByUsername dari model
        $user = $this->userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            $this->session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'logged_in' => true
            ]);

            return redirect()->to('/dashboard');
        } else {
            // Login gagal
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function logout()
    {
        // Hapus semua data session
        $this->session->destroy();
        return redirect()->to('/login');
    }

    // Tambahan method registrasi
    public function register()
    {
        // Tampilkan halaman registrasi
        return view('register');
    }

    public function registerProcess()
    {
        // Validasi input
        $validationRules = [
            'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan ke halaman registrasi dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Siapkan data untuk disimpan
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        // Gunakan method saveUser dari model
        if ($this->userModel->saveUser($data)) {
            // Registrasi berhasil
            return redirect()->to('/login')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            // Registrasi gagal
            return redirect()->back()->withInput()->with('error', 'Gagal mendaftar');
        }
    }
}