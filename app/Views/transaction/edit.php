<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Transaksi /</span> Edit Transaksi
        </h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Transaksi</h5>
            </div>
            <div class="card-body">
                <form action="<?= site_url('transaction/update/'.$transaction['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="<?= $transaction['id'] ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="category_id" class="form-select" required>
                            <?php foreach($categories as $category): ?>
                                <option value="<?= $category['id'] ?>" <?= ($transaction['category_id'] == $category['id']) ? 'selected' : '' ?>>
                                    <?= esc($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control" value="<?= $transaction['date'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" name="description" class="form-control" value="<?= esc($transaction['description']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah (Rp)</label>
                        <input type="number" name="amount" class="form-control" value="<?= $transaction['amount'] ?>" required step="0.01">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipe</label>
                        <select name="type" class="form-select" required>
                            <option value="pemasukan" <?= ($transaction['type'] == 'pemasukan') ? 'selected' : '' ?>>Pemasukan</option>
                            <option value="pengeluaran" <?= ($transaction['type'] == 'pengeluaran') ? 'selected' : '' ?>>Pengeluaran</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <a href="<?= site_url('transaction') ?>" class="btn btn-outline-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>