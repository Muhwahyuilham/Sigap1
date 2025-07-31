<?php

namespace App\Controllers\Satker;
use App\Controllers\BaseController;
use App\Models\OrderModel;

class BuatController extends BaseController
{
    public function index()
    {
        return view('satker/order/index', [
            'title' => 'Order Pengajuan - SIGAP'
        ]);
    }

    public function create()
    {
        $request = $this->request;
        $judul = $request->getPost('judul');
        $jenis = $request->getPost('jenis');
        
        // Hitung prioritas awal (base)
        $basePriority = $this->mapPriority($jenis, $judul);

        // Tentukan deadline berdasarkan prioritas
        $deadlineInDays = $this->calculateDeadlineBasedOnPriority($basePriority);

        // Tentukan tanggal deadline berdasarkan jumlah hari yang dihitung
        $today = new \DateTime();
        $deadlineDate = $today->add(new \DateInterval('P' . $deadlineInDays . 'D'));

        $data = [
            'no_order'      => 'ORD-' . time(),
            'judul'         => $request->getPost('judul'),
            'jenis'         => $request->getPost('jenis'),
            'detail'        => $request->getPost('detail'),
            'email'         => session()->get('email'),
            'username'      => session()->get('username'),
            'status'        => 'pending',
            'tanggal_input' => date('Y-m-d H:i:s'),
            'deadline'      => $deadlineDate->format('Y-m-d'), // Deadline otomatis berdasarkan prioritas
            'priority'      => $basePriority,
        ];

        // Upload file (optional)
        $file = $request->getFile('file');
        if ($file && $file->isValid()) {
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $fileName);

            $data['file_name'] = $fileName;
            $data['file_type'] = $file->getClientMimeType();
            $data['file_size'] = $file->getSize();
            $data['file_path'] = WRITEPATH . 'uploads/' . $fileName;
        }

        // Simpan
        $orderModel = new OrderModel();
        if ($orderModel->insert($data)) {
            return redirect()->to(base_url('user/order'))->with('success', 'Order berhasil dikirim.');
        }
        usort($orders, function($a, $b) {
        if ($a->priority == $b->priority) {
        return strcmp($a->deadline, $b->deadline); // Urutkan berdasarkan deadline jika prioritas sama
        }
    return $b->priority <=> $a->priority; // Urutkan berdasarkan prioritas
    });

        return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan.');
    }

    // -- LOGIKA PRIORITAS & URGENCY (tetap digunakan di sisi input)
    private function mapPriority($jenis, $judul)
{
    $judul = strtolower($judul);

    // Normalisasi jenis agar cocok dengan array
    if ($jenis === 'Layanan Permohonan') {
        $jenisKey = 'Permohonan';
    } elseif ($jenis === 'Layanan Gangguan') {
        $jenisKey = 'Gangguan';
    } else {
        $jenisKey = '';
    }

    $priorityRules = [
        'Permohonan' => [
            7 => ['server', 'aplikasi', 'domain'],
            6 => ['pointing', 'integrasi'],
            5 => ['upload', 'publikasi'],
            4 => ['jaringan'],
            3 => ['kapasitas', 'akun'],
            2 => ['data center', 'kunjungan'],
            1 => ['ruangan']
        ],
        'Gangguan' => [
            3 => ['vpn', 'bandwidth', 'internet'],
            2 => ['aplikasi'],
            1 => ['akun', 'email']
        ]
    ];

    if (isset($priorityRules[$jenisKey])) {
        foreach ($priorityRules[$jenisKey] as $score => $keywords) {
            foreach ($keywords as $word) {
                if (str_contains($judul, $word)) return $score;
            }
        }
    }

    return 1; // fallback
}


    private function calculateDeadlineBasedOnPriority($priority)
    {
    // Tentukan jumlah hari berdasarkan prioritas pengajuan
    switch ($priority) {
        case 7:
            return 3; 
        case 6:
            return 4; 
        case 5:
            return 5; 
        case 4:
            return 6; 
        case 3:
            return 7; 
        case 2:
            return 8; 
        case 1:
            return 9; 
        default:
            return 10; 
    }
    }
}
