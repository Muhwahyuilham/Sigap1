<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Pengajuan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('superadmin/home') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('superadmin/pengajuan') ?>">Master Data Pengajuan</a></li>
                <li class="breadcrumb-item active">Tambah Pengajuan</li>
            </ol>

            <!-- Menampilkan pesan sukses atau error -->
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="/superadmin/pengajuan/store" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="jenis_name">Jenis Pengajuan</label>
                    <select name="jenis_name" class="form-control" required>
                        <option value="Permohonan" <?= old('jenis_name') == 'Permohonan' ? 'selected' : '' ?>>Permohonan</option>
                        <option value="Gangguan" <?= old('jenis_name') == 'Gangguan' ? 'selected' : '' ?>>Gangguan</option>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('jenis_name')): ?>
                        <div class="text-danger"><?= $validation->getError('jenis_name') ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="judul">Judul Pengajuan</label>
                    <input type="text" name="judul" class="form-control" value="<?= old('judul') ?>" required>
                    <?php if (isset($validation) && $validation->hasError('judul')): ?>
                        <div class="text-danger"><?= $validation->getError('judul') ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" class="form-control"><?= old('description') ?></textarea>
                    <?php if (isset($validation) && $validation->hasError('description')): ?>
                        <div class="text-danger"><?= $validation->getError('description') ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </main>
</div>
<br><br>

<?= $this->endSection() ?>
