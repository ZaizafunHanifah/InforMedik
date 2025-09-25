<?php
namespace App\Models;
use CodeIgniter\Model;

class HasilModel extends Model {
    protected $table = 'results';
    protected $allowedFields = [
        'user_id','skor_stress','skor_kecemasan','skor_depresi','created_at'
    ];
    protected $returnType = 'array';
}
