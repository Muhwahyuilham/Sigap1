<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Pengajuan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('superadmin/home') ?>">Home</a></li>
                <li class="breadcrumb-item active">Daftar Pengajuan</li>
            </ol>

            <!-- Flash Messages -->
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <!-- Tambah Pengajuan Button -->
            <a href="/superadmin/pengajuan/create" class="btn btn-primary mb-3">Tambah Pengajuan</a>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Pengajuan (<?= count($pengajuan) ?>)
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis Pengajuan</th>
                                <th>Judul Pengajuan</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengajuan as $p): ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td><?= $p['jenis_name'] ?></td>
                                <td><?= $p['judul'] ?></td>
                                <td><?= $p['description'] ? $p['description'] : 'N/A' ?></td>
                                <td>
                                    <!-- Edit button -->
                                    <a href="/superadmin/pengajuan/edit/<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <!-- Delete button with confirmation -->
                                    <a href="/superadmin/pengajuan/delete/<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')">Hapus</a>
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

<br><br>

<?= $this->endSection() ?>
