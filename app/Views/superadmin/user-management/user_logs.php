<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="mt-4">Log Aktivitas User</h1>

    <!-- Tampilkan log aktivitas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Action</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logs as $log): ?>
                <tr>
                    <td><?= esc($log['user_id']) ?></td>
                    <td><?= esc($log['action']) ?></td>
                    <td><?= esc($log['timestamp']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
