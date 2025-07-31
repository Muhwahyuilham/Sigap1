<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard SuperAdmin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container mt-5">
                <!-- Welcome Section -->
                <div class="card">
                    <div class="card-body bg-light">
                        <h5 class="card-title">Selamat Datang di Dashboard SuperAdmin</h5>
                        <p>Ini adalah halaman beranda untuk superadmin.</p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h4 class="text-primary">Status Order</h4>
                    <div class="row text-center">
                        <!-- Waiting Card -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-danger fs-1">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                    </div>
                                    <h1 class="text-danger"><?= $waitingCount ?></h1>
                                    <p class="text-muted">Waiting</p>
                                </div>
                            </div>
                        </div>

                        <!-- On Process Card -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-primary fs-1">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </div>
                                    <h1 class="text-primary"><?= $processCount ?></h1>
                                    <p class="text-muted">On Process</p>
                                </div>
                            </div>
                        </div>

                        <!-- Completed Card -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-success fs-1">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </div>
                                    <h1 class="text-success"><?= $completedCount ?></h1>
                                    <p class="text-muted">Completed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection() ?> 