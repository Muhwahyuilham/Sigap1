<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="margin-right: 50px;">
            <h1 class="mt-4">Kelola Pengajuan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a></li>
                <li class="breadcrumb-item active">Kelola Pengajuan</li>
            </ol>

            <!-- Menampilkan Notifikasi -->
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
                    Daftar Pengajuan
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($orders) && count($orders) > 0): ?>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><?= $order['id'] ?></td>
                                        <td><?= esc($order['judul_order']) ?></td>
                                        <td>
                                            <span class="badge bg-warning text-dark"><?= ucfirst($order['status']) ?></span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/order/approve/'.$order['id']) ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin menyetujui pengajuan ini?')">Setujui</a>
                                            <a href="<?= base_url('admin/order/reject/'.$order['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menolak pengajuan ini?')">Tolak</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada pengajuan.</td>
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
