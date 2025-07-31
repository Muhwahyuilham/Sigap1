<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="margin-right: 50px;">
            <h1 class="mt-4">Pengajuan Ditolak</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan Ditolak</li>
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
                    Daftar Pengajuan Ditolak
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($rejectedOrders) && count($rejectedOrders) > 0): ?>
                                <?php foreach ($rejectedOrders as $order): ?>
                                    <tr>
                                        <td><?= $order->id ?></td>
                                        <td><?= esc($order->judul_order) ?></td>
                                        <td><span class="badge bg-danger"><?= ucfirst($order->status) ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada pengajuan yang ditolak.</td>
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
