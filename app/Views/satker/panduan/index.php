<?= $this->extend('satker/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Panduan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Panduan</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="mb-0">
                        Halaman ini menampilkan panduan dalam format PDF. Anda dapat membaca panduan di bawah ini.
                    </p>
                </div>
            </div>
            <!-- Menampilkan PDF di dalam iframe -->
            <div class="card mb-4">
                <div class="card-body">
                    <iframe src="<?= base_url('Admin/PanduanController/displayPdf'); ?>" width="100%" height="600px" style="border:none;"></iframe>
                </div>
            </div>
        </div>
    
<?= $this->endSection(); ?>
