<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Inisialisasi session
        $session = \Config\Services::session();

        // Cek apakah user sudah login
        if (!$session->get('logged_in')) {
            // Redirect ke halaman login
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu ada tindakan setelah controller dijalankan
    }
}
