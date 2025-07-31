<?php

namespace App\Controllers\Satker;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class DaftarController extends BaseController
{
    // Menampilkan daftar orderan pengguna
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

    // Hitung total order
    $totalOrders = count($daftarOrder); // Hitung jumlah total order

    // Siapkan data untuk dikirim ke view
    $data = [
        'title' => 'Daftar Order Saya',
        'daftar_order' => $daftarOrder,
        'totalOrders' => $totalOrders, // Kirimkan total orders ke view
    ];

    // Tampilkan view daftar order
    return view('satker/daftar/index', $data);
}

    // Menampilkan form untuk mengedit order berdasarkan no_order
    public function edit($no_order)
    {
        // Periksa apakah pengguna sudah login
        

        // Load model order
        $orderModel = new OrderModel();

        // Ambil data order berdasarkan no_order
        $order = $orderModel->where('no_order', $no_order)->first();

        // Jika order tidak ditemukan, tampilkan error
        if (!$order) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Order tidak ditemukan');
        }

        // Kirim data order ke view
        $data = [
            'title' => 'Edit Order',
            'order' => $order
        ];

        return view('satker/daftar/edit', $data);
    }

    // Memperbarui data order yang telah diedit
   public function update($no_order)
{
    $orderModel = new OrderModel();

    // Ambil data dari form
    $data = [
        'judul' => $this->request->getPost('judul'),
        'jenis' => $this->request->getPost('jenis'),
        'detail' => $this->request->getPost('detail'),
        'tanggal_ubah' => date('Y-m-d H:i:s'),
    ];

    // Jika ada file yang di-upload, tangani penggantiannya
    if ($this->request->getFile('file')->isValid()) {
        $file = $this->request->getFile('file');
        $fileName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $fileName);
        
        // Simpan nama file baru di database
        $data['file_name'] = $file->getName();
        $data['file_path'] = WRITEPATH . 'uploads/' . $fileName;
    }

    // Update data order berdasarkan no_order
    $orderModel->update($no_order, $data);

    // Menambahkan flash message
    session()->setFlashdata('success', 'Order berhasil diperbarui!');

    // Redirect ke halaman daftar orderan
    return redirect()->to(base_url('user/daftar'));
}





    // Menghapus order berdasarkan no_order
    public function delete($no_order)
    {
    // Periksa apakah pengguna sudah login
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(base_url('auth/login'))->with('error', 'Anda harus login terlebih dahulu.');
    }

    // Load model order
    $orderModel = new OrderModel();

    // Hapus order berdasarkan no_order
    $orderModel->where('no_order', $no_order)->delete();

    // Set flashdata untuk notifikasi sukses
    session()->setFlashdata('success', 'Order berhasil dihapus!');

    // Redirect ke halaman daftar orderan
    return redirect()->to(base_url('user/daftar'));
    }
}
