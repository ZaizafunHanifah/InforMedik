<?php
namespace App\Models;
use CodeIgniter\Model;

class HasilModel extends Model {
    protected $table = 'hasil_kuesioner';
    protected $allowedFields = [
        'user_id','depresi_score','depresi_level',
        'kecemasan_score','kecemasan_level',
        'stres_score','stres_level','created_at'
    ];
    protected $returnType = 'array';
}
