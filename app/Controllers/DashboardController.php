<?php
namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'user' => session()->get() // kalau mau tampilkan nama/role
        ];

        return view('dashboard', $data);
    }
}