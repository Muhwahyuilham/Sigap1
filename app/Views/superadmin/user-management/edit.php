<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="mt-4">Edit User</h1>

    <!-- Menampilkan pesan kesalahan jika ada -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <!-- Menampilkan pesan sukses jika ada -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('superadmin/user/update' . $user['id']) ?>" method="POST">
        <?= csrf_field(); ?> <!-- CSRF token untuk melindungi form -->

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $user['nama']) ?>" required>
            <?php if (isset($validation) && $validation->hasError('nama')): ?>
                <div class="text-danger"><?= $validation->getError('nama'); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= old('username', $user['username']) ?>" required>
            <?php if (isset($validation) && $validation->hasError('username')): ?>
                <div class="text-danger"><?= $validation->getError('username'); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email', $user['email']) ?>" required>
            <?php if (isset($validation) && $validation->hasError('email')): ?>
                <div class="text-danger"><?= $validation->getError('email'); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="kasusbag" <?= old('role', $user['role']) == 'kasusbag' ? 'selected' : ''; ?>>Kasusbag</option>
                <option value="admin" <?= old('role', $user['role']) == 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="superadmin" <?= old('role', $user['role']) == 'superadmin' ? 'selected' : ''; ?>>Super Admin</option>
            </select>
            <?php if (isset($validation) && $validation->hasError('role')): ?>
                <div class="text-danger"><?= $validation->getError('role'); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="password">Password (kosongkan jika tidak ingin mengganti)</label>
            <input type="password" class="form-control" id="password" name="password">
            <?php if (isset($validation) && $validation->hasError('password')): ?>
                <div class="text-danger"><?= $validation->getError('password'); ?></div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
<?= $this->endSection() ?>
