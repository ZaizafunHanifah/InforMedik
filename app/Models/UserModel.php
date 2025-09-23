<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $allowedFields = ['nama','password','role','created_at'];
    protected $returnType = 'array';
}
