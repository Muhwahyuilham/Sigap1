<?= $this->extend('satker/layout/template') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Order</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Order</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Order Saya
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Order</th>
                                <th>Tanggal</th>
                                <th>Judul Order</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th class="aksi-column">Aksi</th> <!-- Tambahkan kelas -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($daftar_order as $index => $order): ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td><?= esc($order['no_order']); ?></td>
                                    <td><?= esc($order['tanggal_input']); ?></td>
                                    <td><?= esc($order['judul_order']); ?></td>
                                    <td><?= esc($order['email']); ?></td>
                                    <td><?= esc($order['status']); ?></td>
                                    <td class="aksi-column">
                                        <a href="<?= base_url('user/order/edit/' . $order['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('user/order/delete/' . $order['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
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

<?= $this->endSection(); ?>



