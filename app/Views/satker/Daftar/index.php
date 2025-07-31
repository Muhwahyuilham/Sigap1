<?= $this->extend('satker/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Order</h1>
            <!-- Menampilkan notifikasi sukses -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <!-- Menampilkan notifikasi error -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('user/dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Order</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Order Saya
                    <span class="badge bg-info float-right">Total Order: <?= $totalOrders ?></span> <!-- Total orders -->
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Judul Order</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>Terakhir Diubah</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php if (!empty($daftar_order)): ?>
                                <?php foreach ($daftar_order as $index => $order): ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($order->tanggal_input)) ?></td>
                                        <td><?= $order->judul; ?></td>
                                        <td><?= $order->jenis; ?></td>
                                        <td><?= $order->status; ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($order->tanggal_ubah)) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">No orders found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

                        
<?= $this->endSection() ?>
