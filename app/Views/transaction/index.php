<?= $this->extend('layouts/main.php') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi /</span> Transaksi</h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Daftar Transaksi</h5>
                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
                    Tambah Transaksi
                </button>
            </div>

            <div class="card-body">
                <!-- Menampilkan daftar transaksi -->
                <?php if (!empty($transactions)): ?>
                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Jumlah</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($transactions as $transaction): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $transaction['category_name'] ?? 'tidak ada' ?></td>
                                    <td><?= $transaction['date'] ?></td>
                                    <td><?= $transaction['description'] ?></td>
                                    <td>Rp. <?= number_format($transaction['amount'], 2, ',', '.') ?></td>
                                    <td>
                                        <span class="badge bg-label-<?= $transaction['type'] == 'pemasukan' ? 'success' : 'danger' ?>">
                                            <?= ucfirst($transaction['type']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="/transaction/edit/<?= $transaction['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/transaction/delete/<?= $transaction['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        Tidak ada transaksi yang ditambahkan.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Transaksi -->
<div class="modal fade" id="addTransactionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/transaction/save" method="post">
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select id="type" name="category_id" class="form-control" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" id="date" name="date" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" id="description" name="description" class="form-control" placeholder="Masukkan Deskripsi" />
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah</label>
                        <input type="number" step="0.01" id="amount" name="amount" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipe</label>
                        <select id="type" name="type" class="form-control" required>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit Transaksi -->
<!-- <div class="modal fade" id="editTransactionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/transaction/update" method="post">
                    <input type="hidden" id="edit-id" name="id" />
                    <div class="mb-3">
                        <label for="edit-category" class="form-label">Kategori</label>
                        <input type="text" id="edit-category" name="category" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="edit-date" class="form-label">Tanggal</label>
                        <input type="date" id="edit-date" name="date" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="edit-description" class="form-label">Deskripsi</label>
                        <input type="text" id="edit-description" name="description" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="edit-amount" class="form-label">Jumlah</label>
                        <input type="number" step="0.01" id="edit-amount" name="amount" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="edit-type" class="form-label">Tipe</label>
                        <select id="edit-type" name="type" class="form-control">
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<?= $this->endSection() ?>