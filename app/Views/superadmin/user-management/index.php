<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="mt-4">Manajemen User</h1>
    <a href="<?= base_url('superadmin/user/create') ?>" class="btn btn-primary mb-3">Tambah User</a>

    <!-- Flashdata messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['id']) ?></td>
                <td><?= esc($user['nama']) ?></td>
                <td><?= esc($user['email']) ?></td>
                <td><?= esc($user['role']) ?></td>
                <td>
                    <a href="<?= base_url('superadmin/user/edit/' . $user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <!-- Add delete functionality if needed -->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
