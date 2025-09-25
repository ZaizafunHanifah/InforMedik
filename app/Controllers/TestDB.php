<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class TestDB extends Controller
{
    public function index()
    {
        try {
            $db = Database::connect();

            // Ambil nama database dari koneksi
            $dbName = $db->database;

            echo "✅ Terkoneksi ke database: <b>{$dbName}</b>";
        } catch (\Throwable $e) {
            echo "❌ Gagal koneksi ke database: " . $e->getMessage();
        }
    }
}
