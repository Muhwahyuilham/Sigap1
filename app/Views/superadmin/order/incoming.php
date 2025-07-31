<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pengajuan Masuk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('superadmin/home') ?>">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan Masuk</li>
            </ol>

            <!-- Notifikasi -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Pengajuan Masuk (<?= count($orders) ?>)
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>deadline</th>
                                <th>Status</th>
                                <th>Prioritas</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($orders)): ?>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><?= esc($order->id) ?></td>
                                        <td><?= esc($order->judul) ?></td>
                                        <td><?= esc($order->jenis) ?></td>
                                        <td><?= esc($order->deadline) ?></td>
                                        <td>
                                            <span class="badge 
                                                <?php 
                                                    if ($order->status == 'pending') echo 'bg-warning text-dark';
                                                    elseif ($order->status == 'process') echo 'bg-primary';
                                                    elseif ($order->status == 'done') echo 'bg-success';
                                                ?>">
                                                <?= ucfirst($order->status) ?>
                                            </span>
                                        </td>
                                    <td>
                                        <?php
                                            $priority = $order->priority;
                                            $label = match (true) {
                                            $priority >= 7 => 'Tinggi',
                                            $priority >= 4 => 'Sedang',
                                            default => 'Rendah',
                                            };

                                            $badgeClass = match ($label) {
                                            'Tinggi' => 'danger',
                                            'Sedang' => 'warning',
                                            default => 'secondary',
                                            };
                                        ?>
                                        <span class="badge bg-<?= $badgeClass ?>"><?= $label ?></span>
                                    </td>
                                        <td>
                                            <?php if (!empty($order->file_path)): ?>
                                                <a href="<?= base_url('superadmin/order/download/'.$order->id) ?>" class="btn btn-info btn-sm">
                                                    <i class="fas fa-download"></i> Download
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted">No file</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <?php if ($order->status !== 'process'): ?>
                                                        <li><a class="dropdown-item text-primary" href="<?= base_url('superadmin/order/updateStatus/'.$order->id.'/process') ?>">Proses</a></li>
                                                    <?php endif; ?>
                                                    <?php if ($order->status !== 'pending'): ?>
                                                        <li><a class="dropdown-item text-warning" href="<?= base_url('superadmin/order/updateStatus/'.$order->id.'/pending') ?>">Pending</a></li>
                                                    <?php endif; ?>
                                                    <li><a class="dropdown-item text-success" href="<?= base_url('superadmin/order/updateStatus/'.$order->id.'/done') ?>">Selesai</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada pengajuan.</td>
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
