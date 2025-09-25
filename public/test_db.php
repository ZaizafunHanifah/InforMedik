<?php

require __DIR__ . '/../vendor/autoload.php';

$db = \Config\Database::connect();

if ($db->connID) {
    echo "Database tersambung!";
} else {
    echo "Gagal koneksi database!";
}
