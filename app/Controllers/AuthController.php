<?php
namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController {
    public function register() {
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $model->insert([
                'nama' => $this->request->getPost('nama'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'role' => 'user', // tambahkan ini
                'created_at' => date('Y-m-d H:i:s') // tambahkan ini
            ]);
            return redirect()->to('/login');
        }
        return view('auth/register');
    }

    public function login() {
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $user = $model->where('nama', $this->request->getPost('nama'))->first();
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                session()->set('user_id', $user['id']);
                session()->set('role', $user['role']);
                return redirect()->to('/dashboard');
            }
            return redirect()->back()->with('error', 'Nama/Password salah');
        }
        return view('auth/login');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}
