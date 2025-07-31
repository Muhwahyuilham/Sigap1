<?= $this->extend('satker/layout/template') ?>

    <?= $this->Section('content') ?>
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
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Order</th>
                                            <th>Tanggal</th>
                                            <th>Judul Order</th>
                                            <th>Kategori</th>
                                            <th>email</th>
                                            <th>status</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                            <?php if (!empty($daftar_order)): ?>
                                <?php foreach ($daftar_order as $index => $order): ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><?= $order->no_order; ?></td>
                                        <td><?= $order->tanggal_input; ?></td>
                                        <td><?= $order->judul_order; ?></td>
                                        <td><?= $order->kategori; ?></td>
                                        <td><?= $order->email; ?></td>
                                        <td><?= $order->status; ?></td>
                                        <td>
                                            <!-- Action buttons, you can adjust based on your functionality -->
                                            <a href="<?= base_url('satker/daftar/edit/' . $order->no_order); ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?= base_url('satker/daftar/delete/' . $order->no_order); ?>" class="btn btn-danger">Delete</a>
                                        </td>
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
 
                </main>



    <?= $this->endSection(); ?>