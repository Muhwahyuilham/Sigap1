<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="margin-right: 50px ;">
            <h1 class="mt-4">Kelola Order</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('superadmin/home') ?>">Home</a></li>
                <li class="breadcrumb-item active">Kelola Order</li>
            </ol>

            <!-- Menampilkan Notifikasi -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Order
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
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order->id ?></td>
                                <td><?= $order->judul_order ?></td>
                                <td>
                                    <span class="badge 
                                        <?php 
                                            if ($order->status == 'pending') echo 'bg-warning text-dark';
                                            elseif ($order->status == 'process') echo 'bg-primary';
                                            elseif ($order->status == 'completed') echo 'bg-success';
                                        ?>">
                                        <?= ucfirst($order->status) ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($order->status !== 'completed'): ?>
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
                                                <li><a class="dropdown-item text-success" href="<?= base_url('superadmin/order/updateStatus/'.$order->id.'/completed') ?>">Selesai</a></li>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-muted">Tidak ada aksi</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection() ?> 