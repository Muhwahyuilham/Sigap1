<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class OrderController extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    // Menampilkan daftar pengajuan
    public function index()
    {
        $title = 'Daftar Pengajuan';
        // Ambil data pengajuan dengan status "pending"
        $orders = $this->orderModel->where('status', 'pending')->findAll();

        // Kirim data ke view
        $data = [
            'orders' => $orders,
        ];

        return view('admin/order/incoming.php', $data);
    }

    // Menyetujui pengajuan dan mengirimkan ke halaman order Super Admin
    public function approve($id)
    {
        // Cari data order berdasarkan ID
        $order = $this->orderModel->find($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
        }

        // Update status menjadi "pending" (status awal di halaman Super Admin)
        $this->orderModel->update($id, ['status' => 'process']);

        // Redirect dengan pesan sukses
        return redirect()->to(base_url('admin/orders'))->with('success', 'Pengajuan berhasil disetujui dan dikirim ke Super Admin.');
    }

    // Menolak pengajuan
    public function reject($id)
    {
        // Cari data order berdasarkan ID
        $order = $this->orderModel->find($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
        }

        // Update status menjadi "ditolak"
        $this->orderModel->update($id, ['status' => 'ditolak']);

        // Redirect dengan pesan sukses
        return redirect()->to(base_url('admin/orders'))->with('success', 'Pengajuan berhasil ditolak.');
    }

    // Menampilkan pengajuan yang masuk
    public function incoming()
    {
        $incomingOrders = $this->orderModel->where('status', 'pengajuan')->findAll();
        return view('admin/order/incoming', ['incomingOrders' => $incomingOrders]);
    }

    // Menampilkan pengajuan yang ditolak
    public function rejected()
    {
        $rejectedOrders = $this->orderModel->where('status', 'ditolak')->findAll();
        return view('admin/order/rejected', ['rejectedOrders' => $rejectedOrders]);
    }

    // Menampilkan pengajuan yang sedang diproses
    public function process()
    {
        $orders = $this->orderModel->whereIn('status', ['process', 'done'])->findAll();
        return view('admin/order/process', ['orders' => $orders]);
    }

    // Method to handle file download with login check
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

