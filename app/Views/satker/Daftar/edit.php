<?= $this->extend('satker/layout/template') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Order</h1>

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

            <form action="<?= base_url('user/daftar/update/' . $order->no_order); ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="mb-3">
        <label for="jenis" class="form-label">Jenis</label>
        <select class="form-control" id="jenis" name="jenis" onchange="updateJudulOrder()" required>
            <option value="Layanan Permohonan" <?= ($order->jenis == 'Layanan Permohonan') ? 'selected' : ''; ?>>Layanan Permohonan</option>
            <option value="Layanan Gangguan" <?= ($order->jenis == 'Layanan Gangguan') ? 'selected' : ''; ?>>Layanan Gangguan</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="judul_order" class="form-label">Judul Order</label>
        <select class="form-control" id="judul_order" name="judul_order" required>
            <!-- Opsi untuk judul_order akan diupdate menggunakan dropdown.js -->
        </select>
    </div>

    <div class="mb-3">
        <label for="detail" class="form-label">Detail Order</label>
        <textarea class="form-control" name="detail" rows="3" required><?= esc($order->detail); ?></textarea>
    </div>

    <div class="mb-3">
        <label for="file" class="form-label">Upload File</label>
        <input type="file" name="file" id="file" class="form-control">
        <?php if (!empty($order->file_name)): ?>
            <small>File sebelumnya: <?= esc($order->file_name); ?></small>
        <?php endif; ?>
    </div>

    <div class="d-grid col-3 mx-auto">
        <button type="submit" class="btn btn-primary">Update Pengajuan</button>
    </div>
</form>

        </div>
    </main>
</div>

<?= $this->endSection(); ?>
