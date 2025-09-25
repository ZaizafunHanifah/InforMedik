<?php
namespace App\Controllers;

use App\Models\HasilModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $hasilModel = new HasilModel();
        $userId = session()->get('user_id');

        $data = [
            'user' => session()->get()
        ];

        if ($userId) {
            // Ambil hasil kuesioner user terbaru
            $latestResult = $hasilModel->where('user_id', $userId)->orderBy('created_at', 'DESC')->first();
            if ($latestResult) {
                // Calculate levels for latest result
                $latestResult['stres_level'] = $this->getLevel($latestResult['skor_stress'], [14, 18, 25, 33]);
                $latestResult['kecemasan_level'] = $this->getLevel($latestResult['skor_kecemasan'], [7, 9, 14, 19]);
                $latestResult['depresi_level'] = $this->getLevel($latestResult['skor_depresi'], [9, 13, 20, 27]);
            }
            $data['latest_result'] = $latestResult;

            // Ambil tren skor user dalam 30 hari terakhir
            $tren = $hasilModel->select("DATE(created_at) as tanggal, skor_stress, skor_kecemasan, skor_depresi")
                               ->where('user_id', $userId)
                               ->where('created_at >=', date('Y-m-d', strtotime('-30 days')))
                               ->orderBy('tanggal', 'ASC')
                               ->findAll();
            $data['tren_user'] = $tren;

            // Hitung rata-rata skor user
            $avgScores = $hasilModel->select('AVG(skor_stress) as avg_stress, AVG(skor_kecemasan) as avg_kecemasan, AVG(skor_depresi) as avg_depresi')
                                    ->where('user_id', $userId)
                                    ->first();
            $data['avg_user_scores'] = $avgScores;
        }

        return view('dashboard', $data);
    }

    private function getLevel($score, $batas) {
        if ($score <= $batas[0]) return 'Normal';
        if ($score <= $batas[1]) return 'Ringan';
        if ($score <= $batas[2]) return 'Sedang';
        if ($score <= $batas[3]) return 'Parah';
        return 'Sangat Parah';
    }
}