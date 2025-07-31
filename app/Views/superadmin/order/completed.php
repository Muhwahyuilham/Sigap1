<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pengajuan Selesai</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('superadmin/home') ?>">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan Selesai</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Pengajuan Selesai (<?= count($orders) ?>)
                </div>
                <div class="card-body">
                    <?php
                    // Konfigurasi pagination
                    $itemsPerPage = 10;
                    $totalOrders = count($orders);
                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $totalPages = ceil($totalOrders / $itemsPerPage);

                    // Mengambil data untuk halaman saat ini
                    $offset = ($currentPage - 1) * $itemsPerPage;
                    $currentOrders = array_slice($orders, $offset, $itemsPerPage);
                    ?>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($currentOrders as $order): ?>
                            <tr>
                                <td><?= $order->id ?></td>
                                <td><?= $order->judul ?></td>
                                <td><?= $order->jenis ?></td>
                                <td><?= $order->email ?></td>
                                <td>
                                    <span class="badge bg-success">
                                        <?= ucfirst($order->status) ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Navigasi Pagination -->
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $currentPage - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $currentPage + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>
                            </div>
                            <br>
                            <br>
<?= $this->endSection() ?>
