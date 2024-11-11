<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="row">
            <!-- Welcome Card -->
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang <?= ucfirst(user()->username) ?>! 🎉</h5>
                                <p class="mb-4">
                                    Saldo anda saat ini <span class="fw-bold">Rp <?= number_format($saldo) ?></span>. 
                                    Kelola keuangan anda dengan bijak.
                                </p>
                                <a href="<?= base_url('transaction') ?>" class="btn btn-sm btn-outline-primary">Lihat Transaksi</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/man-with-laptop-light.png" 
                                     height="140" 
                                     alt="View Badge User" 
                                     data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                     data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="row">
            <!-- Card Pemasukan -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Total Pemasukan</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title mb-0 me-2">Rp <?= number_format($totalpemasukan) ?></h4>
                                </div>
                            </div>
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-success">
                                    <i class="bx bx-trending-up"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Pengeluaran -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Total Pengeluaran</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title mb-0 me-2">Rp <?= number_format($totalpengeluaran) ?></h4>
                                </div>
                            </div>
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-danger">
                                    <i class="bx bx-trending-down"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Saldo -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Saldo</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title mb-0 me-2">Rp <?= number_format($saldo) ?></h4>
                                </div>
                            </div>
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-primary">
                                    <i class="bx bx-wallet"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaksi Terbaru -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Transaksi Terbaru</h5>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Tipe</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach($transactions as $transaction): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($transaction['date'])) ?></td>
                                    <td><?= $transaction['category_name'] ?></td>
                                    <td><?= $transaction['description'] ?></td>
                                    <td>
                                        <span class="badge bg-label-<?= $transaction['type'] == 'pemasukan' ? 'success' : 'danger' ?>">
                                            <?= ucfirst($transaction['type']) ?>
                                        </span>
                                    </td>
                                    <td>Rp <?= number_format($transaction['amount']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<?= $this->endSection() ?>