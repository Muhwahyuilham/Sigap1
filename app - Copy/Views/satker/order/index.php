<?= $this->extend('satker/layout/template') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">ORDER PENGAJUAN</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Order</li>
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

            <!-- Form Pengajuan -->
            <form action="<?= base_url('user/buat/create') ?>" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        Buat Order
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Judul Order</label>
                            <select class="form-control" name="judul_order" required>
                                <option value="Layanan Permohonan">Layanan Permohonan</option>
                                <option value="Layanan Perpanjangan">Layanan Gangguan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select class="form-control" name="jenis" required>
                                <option value="Layanan Permohonan">Layanan Permohonan</option>
                                <option value="Layanan Perpanjangan">Layanan Gangguan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <textarea class="form-control" name="kategori" rows="2" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Detail Order</label>
                            <textarea class="form-control" name="detail" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Upload Surat Permohonan</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>

                        <br>

                        <div class="d-grid col-3 mx-auto">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-paper-plane"></i> Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>


<?= $this->endSection(); ?>
