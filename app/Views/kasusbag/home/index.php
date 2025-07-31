<?= $this->extend('kasusbag/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pengajuan yang Perlu Disetujui</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan Kasusbag</li>
            </ol>

            <!-- Flashdata messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Pengajuan yang perlu disetujui oleh Kasusbag
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>No Order</th>
                                <th>Judul</th>
                                <th>Status</th>
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
                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                <?= ucfirst($order->status) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('kasusbag/approve/' . $order->id) ?>" class="btn btn-success btn-sm mb-1" onclick="return confirm('Yakin menyetujui pengajuan ini?')">Setujui</a>
                                            <a href="<?= base_url('kasusbag/reject/' . $order->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menolak pengajuan ini?')">Tolak</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada pengajuan untuk disetujui.</td>
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
