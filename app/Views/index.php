<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('content') ?>






<div class="px-4 pt-5 my-5 text-center border-bottom">
  <h1 class="display-4 fw-bold text-body-emphasis">My<span class="text-primary">Plan</span></h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Nikmati pengalaman baru dalam mengatur keuangan Anda dengan aplikasi yang dirancang untuk membantu Anda mencatat pengeluaran, mengatur anggaran, dan merencanakan masa depan keuangan dengan lebih baik.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
      <?php if(logged_in()) : ?>
        <a href="<?= base_url('dashboard'); ?>" class="btn btn-primary btn-lg px-4 me-sm-3">Masuk</a>
      <?php else :  ?>
      <a href="<?= base_url('login'); ?>" class="btn btn-primary btn-lg px-4 me-sm-3">Login</a>
      <?php endif ?>
      <a href="<?= base_url('documentation'); ?>" class="btn btn-outline-secondary btn-lg px-4">Dokumentasi</a>
    </div>
  </div>
  <div class="overflow-hidden" style="max-height: 45vh;">
    <div class="container px-5 ">
      <img src="<?= base_url('assets/img/layouts/home.png'); ?>" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
    </div>
  </div>
</div>
<?= $this->endSection() ?>