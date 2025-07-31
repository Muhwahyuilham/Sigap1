<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pengajuan Masuk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan Masuk</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Pengajuan Masuk
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>No Order</th>
                                <th>Judul</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Prioritas</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($orders) && count($orders) > 0): ?>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><?= esc($order->id) ?></td>
                                        <td><?= esc($order->no_order) ?></td>
                                        <td><?= esc($order->judul) ?></td>
                                        <td><?= esc($order->deadline) ?></td>
                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                <?= ucfirst($order->status) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php 
                                                // Menentukan label prioritas berdasarkan nilai priority
                                                if ($order->priority >= 7) {
                                                    echo "<span class='badge bg-danger'>Tinggi</span>"; // Prioritas Tinggi
                                                } elseif ($order->priority >= 4) {
                                                    echo "<span class='badge bg-warning text-dark'>Sedang</span>"; // Prioritas Sedang
                                                } else {
                                                    echo "<span class='badge bg-success'>Rendah</span>"; // Prioritas Rendah
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($order->file_name)): ?>
                                                <a href="<?= base_url('admin/order/download/' . $order->id) ?>" class="btn btn-info btn-sm">Download</a>
                                            <?php else: ?>
                                                <span class="text-muted">Tidak ada file</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/order/detail/'.$order->id) ?>" class="btn btn-primary btn-sm mb-1">Lihat Detail</a>
                                            <a href="<?= base_url('admin/order/approve/'.$order->id) ?>" class="btn btn-success btn-sm mb-1" onclick="return confirm('Yakin menyetujui pengajuan ini?')">Setujui</a>
                                            <a href="<?= base_url('admin/order/reject/'.$order->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menolak pengajuan ini?')">Tolak</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada pengajuan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection() ?>
