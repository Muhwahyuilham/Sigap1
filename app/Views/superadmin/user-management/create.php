<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="mt-4">Tambah User</h1>

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

<form action="/superadmin/user/store" method="post">
    <?= csrf_field() ?>

    <div class="form-label">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>" required>
    </div>
    <div class="form-label">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required>
    </div>
    <div class="form-label">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
    </div>
    <div class="form-label">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="superadmin">Super Admin</option>
            <option value="kasusbag">Kasusbag</option>
        </select>
    </div>
    <div class="form-label">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

</div>
<?= $this->endSection() ?>
