<?php
namespace App\Controllers;
use App\Models\HasilModel;

class KuesionerController extends BaseController {
    public function index() {
        return view('kuesioner/form'); // berisi 21 pertanyaan
    }

    public function submit() {
        $data = $this->request->getPost();
        list($dep_score,$dep_level) = $this->hitungDepresi($data);
        list($anx_score,$anx_level) = $this->hitungKecemasan($data);
        list($str_score,$str_level) = $this->hitungStres($data);

        $model = new HasilModel();
        $model->insert([
            'user_id' => session()->get('user_id'),
            'depresi_score' => $dep_score,
            'depresi_level' => $dep_level,
            'kecemasan_score' => $anx_score,
            'kecemasan_level' => $anx_level,
            'stres_score' => $str_score,
            'stres_level' => $str_level
        ]);

        return view('dashboard/mahasiswa', [
            'dep_score'=>$dep_score, 'dep_level'=>$dep_level,
            'anx_score'=>$anx_score, 'anx_level'=>$anx_level,
            'str_score'=>$str_score, 'str_level'=>$str_level,
            'tanggal'=>date('Y-m-d H:i:s')
        ]);
    }

    private function hitungDepresi($data) {
        $butir = ['D1','D2','D3','D4','D5','D6','D7'];
        $total = array_sum(array_intersect_key($data, array_flip($butir))) * 2;
        $level = ($total <= 9) ? "Normal" :
                 (($total <= 13) ? "Ringan" :
                 (($total <= 20) ? "Sedang" :
                 (($total <= 27) ? "Berat" : "Sangat Berat")));
        return [$total, $level];
    }

    // hitungKecemasan() & hitungStres() serupa
}
