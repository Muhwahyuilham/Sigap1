<?php

namespace App\Controllers\Satker;
use App\Controllers\BaseController;
use App\Models\OrderModel;

class BuatController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Order Pengajuan - SIGAP'
        ];

        return view('satker/order/index', $data); // Pastikan view sesuai
    }

    public function create()
    {
        // Ambil data dari form
        $data = [
            'no_order' => 'ORD-' . time(), // Generate nomor order
            'judul_order' => $this->request->getPost('judul_order'),
            'jenis' => $this->request->getPost('jenis'),
            'kategori' => $this->request->getPost('kategori'),
            'detail' => $this->request->getPost('detail'),
            'email' => session()->get('email'), // Ambil email dari sesi pengguna login
            'username' => session()->get('username'), // Ambil username dari sesi pengguna login
            'tanggal_input' => date('Y-m-d H:i:s') // Tanggal pembuatan
        ];
    
        // Handle file upload
        if ($this->request->getFile('file')->isValid()) {
            $file = $this->request->getFile('file');
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $fileName);
    
            // Simpan informasi file
            $data['file_name'] = $file->getName();
            $data['file_type'] = $file->getClientMimeType();
            $data['file_size'] = $file->getSize();
            $data['file_path'] = WRITEPATH . 'uploads/' . $fileName;
        }
    
        // Simpan data ke database
        $orderModel = new OrderModel();
        if ($orderModel->insert($data)) {
            session()->setFlashdata('success', 'Order berhasil dibuat!');
        } else {
            session()->setFlashdata('error', 'Gagal membuat order. Silakan coba lagi.');
        }
    
        return redirect()->to(base_url('user/order'));
    }
    
}
