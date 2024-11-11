<?= $this->extend('layouts/main.php') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> User List</h4>

    <div class="card">
      <div class="card-header">
        <?php if (in_groups('superadmin')) : ?>
          <button
            type="button"
            class="btn btn-primary btn-sm float-end"
            data-bs-toggle="modal"
            data-bs-target="#smallModal">
            Tambah User
          </button>
        <?php endif ?>
        <h5>Table Basic</h5>
      </div>

      <div class="card-body">

        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>image</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php foreach ($users as $user) : ?>
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $user->username ?></strong></td>
                  <td><?= $user->email ?></td>
                  <td>
                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        class="avatar avatar-xs pull-up"
                        title="<?= $user->username ?>">
                        <img src="../assets/img/avatars/<?= $user->user_image ?>" alt="Avatar" class="rounded-circle" />
                      </li>
                    </ul>
                  </td>
                  <td><?= $user->name ?></td>
                  <td><span class="btn btn-sm btn-label-primary me-1"><?= $user->active ? 'aktif' : 'tidak aktif' ?></span></td>
                  <td>

                    <a href="/admin/<?= $user->id ?>">
                      <span class="btn btn-sm btn-secondary">detail</span>
                    </a>

                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->


    </div>
    <!--/ Layout Demo -->
  </div>



</div>








<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= url_to('register') ?>" method="post" class="mb-3">
          <?= csrf_field() ?>

          <div class="row">
            <div class="col mb-3">
              <label for="email" class="form-label"><?= lang('Auth.email') ?></label>
              <input type="email" id="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" />
              <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
              <?php if (session('errors.email')) : ?>
                <div class="invalid-feedback">
                  <?= session('errors.email') ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="row">
            <div class="col mb-3">
              <label for="username" class="form-label"><?= lang('Auth.username') ?></label>
              <input type="text" id="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" />
              <?php if (session('errors.username')) : ?>
                <div class="invalid-feedback">
                  <?= session('errors.username') ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="row g-2">
            <div class="col mb-0">
              <label class="form-label" for="password"><?= lang('Auth.password') ?></label>
              <input type="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" />
              <?php if (session('errors.password')) : ?>
                <div class="invalid-feedback">
                  <?= session('errors.password') ?>
                </div>
              <?php endif ?>
            </div>
            <div class="col mb-0">
              <label for="pass_confirm" class="form-label"><?= lang('Auth.repeatPassword') ?></label>
              <input type="password" id="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" />
              <?php if (session('errors.pass_confirm')) : ?>
                <div class="invalid-feedback">
                  <?= session('errors.pass_confirm') ?>
                </div>
              <?php endif ?>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>






<?= $this->endSection() ?>