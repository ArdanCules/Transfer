<?php

// namespace App\Controllers;

// use App\Models\UserModel;

// class Auth extends BaseController
// {
//     public function login()
//     {
//         return view('auth/login');
//     }

//     public function processLogin()
//     {
//         $session = session();
//         $model = new UserModel();

//         $username = $this->request->getPost('username');
//         $password = $this->request->getPost('password');

//         $user = $model->getUserByUsername($username);

//         if ($user && hash('sha256', $password) === $user['password']) {
//             $session->set([
//                 'username' => $user['username'],
//                 'role' => $user['role'],
//                 'logged_in' => true,
//             ]);
//             return redirect()->to('/dashboard');
//         } else {
//             $session->setFlashdata('error', 'Username atau password salah!');
//             return redirect()->to('/auth/login');
//         }
//     }

//     public function logout()
//     {
//         session()->destroy();
//         return redirect()->to('/auth/login');
//     }
// }