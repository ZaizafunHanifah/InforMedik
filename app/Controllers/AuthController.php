<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
    {
        if ($this->request->getMethod() === 'POST') {
            $nama = trim((string) $this->request->getVar('nama'));
            $password = (string) $this->request->getVar('password');

            if ($nama === '' || $password === '') {
                echo 'error: Nama & Password wajib diisi.';
                exit;
            }
            if (strlen($password) < 6) {
                echo 'error: Password minimal 6 karakter.';
                exit;
            }

            $model = new \App\Models\UserModel();

            $data = [
                'nama'       => $nama,
                'password'   => password_hash($password, PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            try {
                $insertId = $model->insert($data);
            } catch (\Throwable $e) {
                echo 'error: Terjadi kesalahan server. ' . $e->getMessage();
                exit;
            }

            if ($insertId === false) {
                $errors = $model->errors();
                echo 'error: Gagal registrasi: ' . implode('; ', $errors ?: ['unknown']);
                exit;
            }

            return redirect()->to('/login')->with('success', 'Registrasi berhasil. Silakan login.');
        }

        return view('auth/register');
    }

    public function login()
    {
        helper(['form', 'url']);

        if ($this->request->getMethod() === 'POST') {
            $model = new UserModel();
            $user = $model->where('nama', $this->request->getPost('nama'))->first();

            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                // Set session (role diset default jika tidak ada kolom role)
                session()->set([
                    'user_id'   => $user['id'],
                    'nama'      => $user['nama'],
                    'role'      => $user['role'] ?? null,
                    'logged_in' => true,
                ]);

                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->withInput()->with('error', 'Nama atau Password salah.');
            }
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah logout.');
    }
}