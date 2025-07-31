<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\OrderModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        $orderModel = new OrderModel();
        
        $data = [
            'title' => 'Dashboard Admin',
            'waitingCount' => $orderModel->where('status', 'pending')->countAllResults(),
            'processCount' => $orderModel->where('status', 'process')->countAllResults(),
            'completedCount' => $orderModel->where('status', 'done')->countAllResults(),
        ];
        
        return view('admin/home/index', $data);
    }
} 