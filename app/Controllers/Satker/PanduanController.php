<?php

namespace App\Controllers\Satker;
use App\Controllers\BaseController;

class PanduanController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Panduan - SIGAP',
        ];

        return view('satker/panduan/index', $data);
    }

    public function displayPdf()
    {
        // Pastikan file ada di public/uploads/client.pdf atau sesuaikan jalur
        $filePath = FCPATH . 'uploads/client.pdf';

        if (file_exists($filePath)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
            exit;
        } else {
            echo "File PDF tidak ditemukan.";
        }
    }
}
