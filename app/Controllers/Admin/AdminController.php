<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\ResultModel; // <-- TAMBAHKAN BARIS INI

class AdminController extends BaseController
{
    // Menampilkan halaman login admin
    public function login_form()
    {
        return view('admin/login');
    }

    // Memproses upaya login admin
    public function login()
    {
        $session = session();
        $adminModel = new AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        log_message('debug', 'Admin login attempt: username=' . $username);

        $admin = $adminModel->where('username', $username)->first();

        log_message('debug', 'Admin found: ' . ($admin ? 'yes' : 'no'));

        if ($admin && password_verify($password, $admin['password'])) {
            log_message('debug', 'Admin login success');
            $sessionData = [
                'admin_id'        => $admin['id'],
                'admin_username'  => $admin['username'],
                'admin_logged_in' => TRUE
            ];
            $session->set($sessionData);
            return redirect()->to('/admin/dashboard');
        } else {
            log_message('debug', 'Admin login failed');
            $session->setFlashdata('error', 'Username atau Password Admin salah.');
            return redirect()->to('/admin/login');
        }
    }

    // Proses logout admin
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }

    // Menampilkan halaman dashboard dengan data analitik
    public function dashboard()
    {
        $resultModel = new ResultModel(); // Baris ini sekarang akan berfungsi
        $data = [];

        // 1. Menghitung Rata-rata Skor (Data Agregat)
        $avgScores = $resultModel->select('AVG(skor_stress) as avg_stress, AVG(skor_kecemasan) as avg_kecemasan, AVG(skor_depresi) as avg_depresi')
                                 ->first();
        $data['avg_scores'] = $avgScores;

        // 2. Menghitung Distribusi Level untuk setiap kategori
        $data['distribusi_stress']    = $this->hitungDistribusi('skor_stress', [14, 18, 25, 33]);
        $data['distribusi_kecemasan'] = $this->hitungDistribusi('skor_kecemasan', [7, 9, 14, 19]);
        $data['distribusi_depresi']   = $this->hitungDistribusi('skor_depresi', [9, 13, 20, 27]);

        // 3. Mengambil data Tren Waktu
        $tren = $resultModel->select("DATE(created_at) as tanggal, AVG(skor_stress) as avg_stress")
                            ->where('created_at >=', date('Y-m-d', strtotime('-30 days')))
                            ->groupBy('DATE(created_at)')
                            ->orderBy('tanggal', 'ASC')
                            ->findAll();
        $data['tren_waktu'] = $tren;

        return view('admin/dashboard', $data);
    }

    // Fungsi bantuan untuk menghitung distribusi level
    private function hitungDistribusi($field, $batas)
    {
        $resultModel = new ResultModel();
        return $resultModel->select("
            CASE
                WHEN $field <= $batas[0] THEN 'Normal'
                WHEN $field <= $batas[1] THEN 'Ringan'
                WHEN $field <= $batas[2] THEN 'Sedang'
                WHEN $field <= $batas[3] THEN 'Parah'
                ELSE 'Sangat Parah'
            END as level,
            COUNT(id) as jumlah
        ")->groupBy('level')->findAll();
    }
}