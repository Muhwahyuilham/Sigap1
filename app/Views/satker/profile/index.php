<?= $this->extend('satker/layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
    <h2>Profile User</h2>

    <!-- Alert Messages -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')) : ?>
        <?php $errors = session()->getFlashdata('errors'); ?>
        <?php if (is_array($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php else : ?>
            <div class="alert alert-danger"><?= esc($errors) ?></div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Profile Display and Edit Form -->
    <div class="card">
        <div class="card-body">
            <form action="/user/profile/update" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="nama" class="form-label">Name</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="nama" 
                        name="nama" 
                        value="<?= old('nama', esc($user['nama'] ?? '')) ?>" 
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        value="<?= old('email', esc($user['email'] ?? '')) ?>" 
                        required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="username" 
                        name="username" 
                        value="<?= old('username', esc($user['username'] ?? '')) ?>" 
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        name="password" 
                        required>
                </div>
                <button type="submit" class="btn btn-primary" id="updateProfileButton">Update Profile</button>
            </form>
        </div>
    </div>
        </main>
<script>
    document.getElementById('updateProfileButton').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default form submission

        // SweetAlert confirmation
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan memperbarui profil Anda.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, perbarui',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form after confirmation
                document.getElementById('profileForm').submit();
            }
        });
    });
</script>
        
        
<?= $this->endSection() ?>
