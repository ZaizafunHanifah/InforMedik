<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    // Kolom yg boleh diisi (tambahkan created_at agar aman bila diset otomatis)
    protected $allowedFields  = ['nama', 'password', 'created_at'];

    // Pakai timestamps hanya untuk created_at (tabel tidak punya updated_at)
    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = ''; // kosongkan untuk menonaktifkan updated_at

    // Validasi disabled untuk test
    // protected $validationRules = [
    //     'nama'     => 'required|min_length[3]|max_length[100]|is_unique[users.nama]',
    //     'password' => 'required|min_length[6]|max_length[255]',
    // ];

    // protected $validationMessages = [
    //     'nama' => [
    //         'is_unique' => 'Nama sudah digunakan.',
    //     ],
    // ];
}