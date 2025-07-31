<?php

namespace App\Controllers\Satker;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class DashboardController extends BaseController
{
    public function index(): string
    {
        // Ambil username dari session
        $username = session()->get('username');

        // Cek apakah username ada dalam session, jika tidak redirect ke login
        if (!$username) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Anda harus login terlebih dahulu.');
        }

        $orderModel = new OrderModel();
        
        // Ambil jumlah order berdasarkan status dan username yang login
        $waitingCount = $orderModel->where('username', $username)->where('status', 'pending')->countAllResults();
        $processCount = $orderModel->where('username', $username)->where('status', 'process')->countAllResults();
        $completedCount = $orderModel->where('username', $username)->where('status', 'done')->countAllResults();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title' => 'Dashboard Satker',
            'waitingCount' => $waitingCount,
            'processCount' => $processCount,
            'completedCount' => $completedCount,
        ];

        return view('satker/dashboard/index', $data);
    }
}
