<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Detail Pengajuan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/orders') ?>">Pengajuan Masuk</a></li>
                <li class="breadcrumb-item active">Detail Pengajuan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Detail Pengajuan
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>No Order</th>
                                <td><?= esc($order->no_order) ?></td>
                            </tr>
                            <tr>
                                <th>Judul</th>
                                <td><?= esc($order->judul) ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Pengajuan</th>
                                <td><?= esc($order->jenis) ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge bg-warning text-dark">
                                        <?= ucfirst($order->status) ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Prioritas</th>
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
                            </tr>
                            <tr>
                                <th>Deadline</th>
                                <td><?= esc($order->deadline) ?></td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td><?= esc($order->detail) ?></td>
                            </tr>
                            <tr>
                                <th>File</th>
                                <td>
                                    <?php if (!empty($order->file_name)): ?>
                                        <a href="<?= base_url('admin/order/download/' . $order->id) ?>" class="btn btn-info btn-sm">Download</a>
                                    <?php else: ?>
                                        <span class="text-muted">Tidak ada file</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="<?= base_url('admin/orders') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection() ?>
