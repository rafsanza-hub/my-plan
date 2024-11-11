<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tujuan Keuangan /</span> Daftar Tujuan</h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Tujuan Keuangan Anda</h5>
                <a href="<?= base_url('goal/create') ?>" class="btn btn-primary btn-sm float-end">Tambah Goal</a>

            </div>
            <div class="card-body">
                <!-- Menampilkan daftar tujuan -->
                <?php if (!empty($goals)): ?>
                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tujuan</th>
                                <th>Jumlah Target</th>
                                <th>Jumlah Tercapai</th>
                                <th>Progres</th>
                                <th>Jatuh Tempo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($goals as $goal): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $goal['name'] ?></td>
                                    <td>Rp. <?= number_format($goal['target_amount'], 2, ',', '.') ?></td>
                                    <td>Rp. <?= number_format($goal['current_amount'], 2, ',', '.') ?></td>
                                    <td>
                                        <div class="progress" style="height: 20px;">
                                            <?php
                                            $percentage = ($goal['current_amount'] / $goal['target_amount']) * 100;
                                            $percentage = min(100, $percentage);
                                            ?>
                                            <div class="progress-bar <?= $percentage >= 100 ? 'bg-success' : 'bg-primary' ?>"
                                                role="progressbar"
                                                style="width: <?= $percentage ?>%"
                                                aria-valuenow="<?= $percentage ?>"
                                                aria-valuemin="0"
                                                aria-valuemax="100">
                                                <?= number_format($percentage, 1) ?>%
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $goal['due_date'] ? date('d-m-Y', strtotime($goal['due_date'])) : '-' ?></td>
                                    <td>
                                        <a href="<?= base_url('goal/edit/' . $goal['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= site_url('goal/delete/' . $goal['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tujuan ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        Tidak ada tujuan yang ditambahkan.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Form untuk menambah tujuan -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Perbarui Progres</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('goal/updateAmount') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="goal_id" class="form-label">Nama Tujuan</label>
                        <select class="form-select" id="goal_id" name="goal_id" requireed>
                            <?php foreach ($goals as $goal) : ?>
                                <option value="<?= $goal['id'] ?>"><?= $goal['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="current_amount" class="form-label">Jumlah Target (Rp)</label>
                        <input type="number" class="form-control" id="current_amount" name="current_amount" required step="0.01">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Tujuan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>