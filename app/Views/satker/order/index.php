<?= $this->extend('satker/layout/template') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">BUAT PENGAJUAN</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('user/dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Buat Pengajuan</li>
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
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis Order</label>
                            <select class="form-control" id="jenis" name="jenis" onchange="updateJudulOrder()" required>
                                <option value="Layanan Permohonan">Layanan Permohonan</option>
                                <option value="Layanan Gangguan">Layanan Gangguan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Order</label>
                            <select class="form-control" id="judul" name="judul" required>
                                <!-- Opsi akan diupdate berdasarkan pilihan jenis -->
                            </select>
                        </div>
                        <!-- Form Inputan Detail Order -->
                        <div class="mb-3">
                            <label class="form-label">Detail Order</label>
                            <textarea class="form-control" name="detail" rows="3" required></textarea>
                        </div>
                        <!-- Form untuk Upload Surat Permohonan -->
                        <div class="mb-3">
                            <label for="file" class="form-label">Upload Surat Permohonan</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>
                        <!-- Tombol Submit -->
                        <div class="d-grid col-3 mx-auto">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-paper-plane"></i> Submit</button>
                        </div>
                    </div>    
                </div>
            </form>
        </div>
    </main> 
<script>
document.addEventListener("DOMContentLoaded", function () {
    const dueDateInput = document.getElementById("deadline");
    const today = new Date();
    const minDate = new Date(today);
    const maxDate = new Date(today);

    minDate.setDate(today.getDate() + 1);
    maxDate.setDate(today.getDate() + 7);

    const formatDate = (d) => d.toISOString().split("T")[0];

    dueDateInput.min = formatDate(minDate);
    dueDateInput.max = formatDate(maxDate);
});
</script>
<?= $this->endSection(); ?>
     




