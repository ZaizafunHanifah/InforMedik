<?php
namespace App\Controllers;
use App\Models\HasilModel;

class KuesionerController extends BaseController {
    public function index() {
        return view('kuesioner/form'); // berisi 21 pertanyaan
    }

    public function submit() {
        $data = $this->request->getPost();

        // Forward Chaining: Process answers and apply rules step by step
        $facts = $this->extractFacts($data);
        $conclusions = $this->applyRules($facts);

        $model = new HasilModel();
        $model->insert([
            'user_id' => session()->get('user_id'),
            'skor_depresi' => $conclusions['depresi']['score'],
            'skor_kecemasan' => $conclusions['kecemasan']['score'],
            'skor_stress' => $conclusions['stress']['score']
        ]);

        // Set flash message with results
        session()->setFlashdata('kuesioner_result', [
            'dep_score'=>$conclusions['depresi']['score'], 'dep_level'=>$conclusions['depresi']['level'],
            'anx_score'=>$conclusions['kecemasan']['score'], 'anx_level'=>$conclusions['kecemasan']['level'],
            'str_score'=>$conclusions['stress']['score'], 'str_level'=>$conclusions['stress']['level'],
            'tanggal'=>date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/dashboard');
    }

    // Extract facts from form data
    private function extractFacts($data) {
        $facts = [];
        foreach ($data as $key => $value) {
            if (preg_match('/^[DAS]\d+$/', $key)) {
                $facts[$key] = (int)$value;
            }
        }
        return $facts;
    }

    // Apply rules using forward chaining
    private function applyRules($facts) {
        $conclusions = [];

        // Rule 1: Calculate Depression Score
        $depQuestions = ['D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7'];
        $depScore = 0;
        foreach ($depQuestions as $q) {
            if (isset($facts[$q])) {
                $depScore += $facts[$q];
            }
        }
        $depScore *= 2; // DASS-21 scoring
        $conclusions['depresi'] = [
            'score' => $depScore,
            'level' => $this->determineLevel($depScore, [9, 13, 20, 27]) // Normal, Ringan, Sedang, Parah, Sangat Parah
        ];

        // Rule 2: Calculate Anxiety Score
        $anxQuestions = ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7'];
        $anxScore = 0;
        foreach ($anxQuestions as $q) {
            if (isset($facts[$q])) {
                $anxScore += $facts[$q];
            }
        }
        $anxScore *= 2; // DASS-21 scoring
        $conclusions['kecemasan'] = [
            'score' => $anxScore,
            'level' => $this->determineLevel($anxScore, [7, 9, 14, 19])
        ];

        // Rule 3: Calculate Stress Score
        $strQuestions = ['S1', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7'];
        $strScore = 0;
        foreach ($strQuestions as $q) {
            if (isset($facts[$q])) {
                $strScore += $facts[$q];
            }
        }
        $strScore *= 2; // DASS-21 scoring
        $conclusions['stress'] = [
            'score' => $strScore,
            'level' => $this->determineLevel($strScore, [14, 18, 25, 33])
        ];

        return $conclusions;
    }

    // Rule-based level determination
    private function determineLevel($score, $thresholds) {
        if ($score <= $thresholds[0]) return 'Normal';
        if ($score <= $thresholds[1]) return 'Ringan';
        if ($score <= $thresholds[2]) return 'Sedang';
        if ($score <= $thresholds[3]) return 'Parah';
        return 'Sangat Parah';
    }

    public function history()
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }

        $model = new HasilModel();
        $rows = $model->where('user_id', $userId)
                      ->orderBy('created_at', 'DESC')
                      ->findAll();

        // Add levels to each row
        foreach ($rows as &$row) {
            $row['depresi_level'] = $this->determineLevel($row['skor_depresi'], [9, 13, 20, 27]);
            $row['kecemasan_level'] = $this->determineLevel($row['skor_kecemasan'], [7, 9, 14, 19]);
            $row['stres_level'] = $this->determineLevel($row['skor_stress'], [14, 18, 25, 33]);
        }

        $data = [
            'rows' => $rows
        ];

        return view('kuesioner/history', $data);
    }
}
