<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link" href="<?= base_url('superadmin/home') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Home
                </a>
                <a class="nav-link" href="<?= base_url('superadmin/orders/incoming') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-inbox"></i></div>
                    Pengajuan Masuk
                </a>
                <a class="nav-link" href="<?= base_url('superadmin/orders/completed') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                    Pengajuan Selesai
                </a>

                <!-- Menambahkan menu Manajemen User dengan dropdown -->
                <div class="sb-sidenav-menu-heading">Manajemen</div>
                <a class="nav-link" href="<?= base_url('superadmin/user-management') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Manajemen User
                </a>

                <!-- Menambahkan menu Master Data Pengajuan -->
                <a class="nav-link" href="<?= base_url('superadmin/pengajuan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Master Data Pengajuan
                </a>

                <!-- Dropdown untuk Log User -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLog" aria-expanded="false" aria-controls="collapseLog">
                    <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                    Log User
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLog" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <div class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?= base_url('superadmin/user/logs') ?>">Lihat Log Aktivitas</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
