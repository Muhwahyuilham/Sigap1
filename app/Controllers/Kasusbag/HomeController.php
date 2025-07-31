<?php

namespace App\Controllers\Kasusbag;
use App\Controllers\BaseController;
use App\Models\OrderModel;

class HomeController extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        // Get orders needing approval by 'kasusbag'
        $orders = $this->orderModel->where('status', 'process')->findAll();

        return view('kasusbag/home/index', ['orders' => $orders]);
    }

   public function approve($id)
{
    // Validasi jika pengajuan tidak ada
    if (!$this->orderModel->find($id)) {
        return redirect()->to('/kasusbag')->with('error', 'Pengajuan tidak ditemukan');
    }

    // Update status pengajuan menjadi "done"
    $this->orderModel->update($id, ['status' => 'done']);
    
    // Tetap di halaman yang sama setelah approve
    return redirect()->back()->with('success', 'Pengajuan berhasil disetujui dan selesai');
}

public function reject($id)
{
    // Validasi jika pengajuan tidak ada
    if (!$this->orderModel->find($id)) {
        return redirect()->to('/kasusbag')->with('error', 'Pengajuan tidak ditemukan');
    }

    // Update status pengajuan menjadi "rejected"
    $this->orderModel->update($id, ['status' => 'ditolak']);
    
    // Tetap di halaman yang sama setelah reject
    return redirect()->back()->with('error', 'Pengajuan ditolak');
}

}
