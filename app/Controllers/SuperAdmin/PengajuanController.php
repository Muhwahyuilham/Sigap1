<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;

class PengajuanController extends BaseController
{
    protected $pengajuanModel;

    public function __construct()
    {
        $this->pengajuanModel = new PengajuanModel();
    }

    // Menampilkan daftar pengajuan
    public function index()
    {
        $data = [
            'pengajuan' => $this->pengajuanModel->findAll()  // Ambil semua data pengajuan
        ];
        return view('superadmin/pengajuan/index', $data);
    }

    // Menampilkan form untuk menambahkan pengajuan
    public function create()
    {
        return view('superadmin/pengajuan/create');
    }

    // Menyimpan pengajuan
    public function store()
    {
        if (!$this->validate([
            'jenis_name' => 'required|in_list[Permohonan,Gangguan]',  // Hanya dua jenis
            'judul' => 'required|min_length[3]',
        ])) {
            return redirect()->to('/superadmin/pengajuan/create')->withInput()->with('error', 'Form data tidak valid!');
        }

        // Ambil data dari form
        $data = [
            'jenis_name' => $this->request->getPost('jenis_name'),
            'judul' => $this->request->getPost('judul'),
        ];

        // Insert ke database
        if ($this->pengajuanModel->insert($data)) {
            session()->setFlashdata('success', 'Pengajuan berhasil ditambahkan!');
            return redirect()->to('/superadmin/pengajuan');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan pengajuan!');
            return redirect()->to('/superadmin/pengajuan/create');
        }
    }

    // Menampilkan form untuk mengedit pengajuan
    public function edit($id)
    {
        $pengajuan = $this->pengajuanModel->find($id);  // Ambil data pengajuan berdasarkan ID
        if (!$pengajuan) {
            return redirect()->to('/superadmin/pengajuan')->with('error', 'Pengajuan tidak ditemukan');
        }

        $data = [
            'pengajuan' => $pengajuan
        ];
        return view('superadmin/pengajuan/edit', $data);
    }

    // Memperbarui pengajuan
    public function update($id)
    {
        if (!$this->validate([
            'jenis_name' => 'required|in_list[Permohonan,Gangguan]',
            'judul'      => 'required|min_length[3]',
        ])) {
            return redirect()->to('/superadmin/pengajuan/edit/'.$id)->withInput()->with('error', 'Form data tidak valid!');
        }

        // Ambil data dari form
        $data = [
            'jenis_name' => $this->request->getPost('jenis_name'),
            'judul'      => $this->request->getPost('judul'),
            'description' => $this->request->getPost('description')
        ];

        // Update data pengajuan
        if ($this->pengajuanModel->update($id, $data)) {
            session()->setFlashdata('success', 'Pengajuan berhasil diperbarui!');
            return redirect()->to('/superadmin/pengajuan');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui pengajuan!');
            return redirect()->to('/superadmin/pengajuan/edit/'.$id);
        }
    }

    // Menghapus pengajuan
    public function delete($id)
    {
        if ($this->pengajuanModel->delete($id)) {
            session()->setFlashdata('success', 'Pengajuan berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus pengajuan!');
        }
        return redirect()->to('/superadmin/pengajuan');
    }
}
