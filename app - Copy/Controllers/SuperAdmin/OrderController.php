<?php

namespace App\Controllers\Superadmin;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class OrderController extends BaseController
{
    protected $orderModel; // Deklarasi properti

    public function __construct()
    {
        // Inisialisasi model
        $this->orderModel = new OrderModel();
    }

    public function index(): string
    {
        // Ambil semua data order
        $orders = $this->orderModel->findAll();

        $data = [
            'title' => 'Kelola Order - SIGAP',
            'orders' => $orders
        ];

        return view('superadmin/order/index', $data);
    }

    public function updateStatus($id, $status)
    {
        // Validasi status
        $validStatuses = ['pending', 'process', 'done'];
        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        // Update status
        $data = ['status' => $status];

        if ($this->orderModel->update($id, $data)) {
            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status.');
        }
    }

    public function incoming()
    {
        $data = [
            'title' => 'Pengajuan Masuk',
            'orders' => $this->orderModel->where('status !=', 'done')->findAll()
        ];
        return view('superadmin/order/incoming', $data);
    }

    public function completed()
    {
        $data = [
            'title' => 'Pengajuan Selesai',
            'orders' => $this->orderModel->where('status', 'done')->findAll()
        ];
        return view('superadmin/order/completed', $data);
    }

    public function download($orderId)
{
    // Check if the user is logged in
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(base_url('auth/login'))->with('error', 'You must be logged in to download the file.');
    }

    // Get the order from the database
    $order = $this->orderModel->find($orderId);

    // Check if the order exists and if a file is attached
    if (!$order || empty($order->file_path)) {
        return redirect()->back()->with('error', 'File not found or not available for download.');
    }

    // If the file exists, serve it for download
    return $this->response->download($order->file_path, null);
}
    
    
}
