<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Anggaran /</span> Daftar Anggaran</h4>
        <?php if (!empty($budgets)): ?>
        <div class="alert alert-warning alert-dismissible " role="alert">
            Sisa Anggaran akan berkurang jika anda melakukan Transaksi
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h5>Anggaran Anda</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($budgets)): ?>
                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Sisa Anggaran</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Tanggal Dibuat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($budgets as $budget): ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= esc($budget['category_name']) ?></td>
                                    <td>Rp. <?= number_format($budget['amount'], 2, ',', '.') ?></td>
                                    <td><?= esc(ucfirst($budget['period'])) ?></td>
                                    <td><?= esc($budget['created_at']) ?></td>
                                    <td>
                                        <a href="<?= base_url('budget/edit/' . $budget['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('budget/delete/' . $budget['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggaran ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        Tidak ada anggaran yang tersedia.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Form untuk menambah anggaran baru -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Tambah Anggaran Baru</h5>
            </div>
            <div class="card-body">
                <form action="<?= site_url('budget/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"><?= esc($category['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah Anggaran (Rp)</label>
                        <input type="number" class="form-control" id="amount" name="amount" required step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="period" class="form-label">Periode</label>
                        <select class="form-select" id="period" name="period" required>
                            <option value="monthly">Bulanan</option>
                            <option value="yearly">Tahunan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Anggaran</button>
                </form>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>