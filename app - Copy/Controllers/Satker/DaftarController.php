<?php

namespace App\Controllers\Satker;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class DaftarController extends BaseController
{
    public function daftar_orderan()
    {
        // Periksa apakah pengguna sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil username dari session
        $username = session()->get('username');

        // Load model order
        $orderModel = new OrderModel();

        // Ambil daftar order berdasarkan username
        $daftarOrder = $orderModel->where('username', $username)->orderBy('tanggal_input', 'DESC')->findAll();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title' => 'Daftar Order Saya',
            'daftar_order' => $daftarOrder
        ];

        // Tampilkan view daftar order
        return view('satker/daftar/index', $data);
    }
}
