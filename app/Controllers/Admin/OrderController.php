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
        $orders = $this->orderModel->where('status', 'pending')
                    ->orderBy('priority', 'DESC') // Urutkan berdasarkan prioritas (tertinggi dulu)
                    ->orderBy('deadline', 'ASC')  // Urutkan berdasarkan deadline (terdekat dulu)
                    ->findAll();
        // Kirim data ke view
        $data = [
            'orders' => $orders,
        ];

        return view('admin/order/incoming.php', $data);
    }

    public function incoming()
{
    // Ambil data pengajuan dengan status 'pending', urutkan berdasarkan prioritas dan deadline
    $orders = $this->orderModel->where('status', 'pending')
        ->orderBy('priority', 'DESC') // Urutkan berdasarkan prioritas
        ->orderBy('deadline', 'ASC')  // Urutkan berdasarkan deadline (terdekat dulu)
        ->findAll();

    // Kirim data ke view
    return view('admin/order/incoming', [
        'title'  => 'Pengajuan Masuk',
        'orders' => $orders
    ]);
    }

    public function detail($id)
    {
    // Ambil data pengajuan berdasarkan ID
    $order = $this->orderModel->find($id); // Sesuaikan dengan model yang Anda gunakan

    // Jika pengajuan tidak ditemukan, redirect atau tampilkan error
    if (!$order) {
        return redirect()->to('/admin/order')->with('error', 'Pengajuan tidak ditemukan.');
    }

    // Kirim data pengajuan ke view
    return view('admin/order/detail', ['order' => $order]);
    }

    public function approve($id)
    {
        $order = $this->orderModel->find($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
        }

        $this->orderModel->update($id, ['status' => 'process']);
        return redirect()->to(base_url('admin/orders'))->with('success', 'Pengajuan disetujui.');
    }

    public function reject($id)
    {
        $order = $this->orderModel->find($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
        }

        $this->orderModel->update($id, ['status' => 'ditolak']);
        return redirect()->to(base_url('admin/orders'))->with('success', 'Pengajuan ditolak.');
    }

    public function rejected()
    {
        $orders = $this->orderModel->where('status', 'ditolak')->findAll();
        return view('admin/order/rejected', [
            'title'  => 'Pengajuan Ditolak',
            'orders' => $orders
        ]);
    }

   public function process()
    {
        // Ambil halaman saat ini
        $page = $this->request->getVar('page') ?? 1; // Menangkap halaman yang diminta, default halaman 1

        // Tentukan jumlah data per halaman
        $perPage = 8;

        // Ambil data berdasarkan halaman saat ini dan status 'process' atau 'done'
        $orders = $this->orderModel
            ->whereIn('status', ['process', 'done'])  // Filter berdasarkan status
            ->paginate($perPage, 'default', $page);  // Pagination dengan perPage dan halaman saat ini

        // Dapatkan link pagination
        $pager = $this->orderModel->pager;

        // Kirim data ke view
        return view('admin/order/process', [
            'title'  => 'Pengajuan Diproses',
            'orders' => $orders,
            'pager' => $pager  // Kirim objek pager untuk digunakan di view
        ]);
    }

    public function download($orderId)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Silakan login dahulu.');
        }

        $order = $this->orderModel->find($orderId);

        if (!$order || empty($order->file_path)) {
            return redirect()->back()->with('error', 'File tidak tersedia.');
        }

        return $this->response->download($order->file_path, null);
    }

    // ============ PRIORITY CALC ============

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

    // Tentukan prioritas berdasarkan kata kunci dalam judul
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
    
    $today = new \DateTime(); 
    $deadlineDate = clone $today; 

    switch ($priority) {
        case 7:
            $deadlineDate->modify('+3 days');
            break;
        case 6:
            $deadlineDate->modify('+4 days');
            break;
        case 5:
            $deadlineDate->modify('+5 days');
            break;
        case 4:
            $deadlineDate->modify('+6 days');
            break;
        case 3:
            $deadlineDate->modify('+7 days');
            break;
        case 2:
            $deadlineDate->modify('+8 days');
            break;
        case 1:
            $deadlineDate->modify('+9 days');
            break;
        default:
            $deadlineDate->modify('+10 days');
            break;
    }
    
    // Mengembalikan tanggal yang dihitung
    return $deadlineDate->format('Y-m-d'); 
}

}

