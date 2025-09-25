<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    // Kolom yang boleh diisi melalui Model::insert/update
    // created_at disertakan karena kita pakai useTimestamps (Model akan set otomatis).
    protected $allowedFields  = ['nama', 'password', 'created_at'];

    // Pakai timestamps hanya untuk created_at (tabel tidak memiliki updated_at)
    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = ''; // kosongkan untuk menonaktifkan updated_at

    // Jika ingin aktifkan validasi model, buka komentar ini dan sesuaikan:
    // protected $validationRules = [
    //     'nama'     => 'required|min_length[3]|max_length[100]|is_unique[users.nama]',
    //     'password' => 'required|min_length[6]|max_length[255]',
    // ];
    //
    // protected $validationMessages = [
    //     'nama' => [
    //         'is_unique' => 'Nama sudah digunakan.',
    //     ],
    // ];
}