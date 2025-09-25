<?php
namespace App\Controllers;

class Debug extends BaseController
{
    public function index()
    {
        echo "<h3>DEBUG TEST</h3>";
        echo "<form method='POST' action=''><input name='nama'><button>Kirim</button></form>";

        echo "<pre>";
        echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . PHP_EOL;
        echo "GET: "; print_r($_GET);
        echo "POST: "; print_r($_POST);
        echo "</pre>";
        exit;
    }
}
