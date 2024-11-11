<?= $this->extend('layouts/login_layout.php') ?>

<?= $this->section('content') ?>
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register Card -->
      <div class="card ">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
          <a href="/" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <img src="<?= base_url('assets/img/favicon/myplan3.png') ?>" style="width: 17px;" alt="">
              </span>
              <span class="app-brand-text demo text-body fw-bolder">MyPlan</span>
            </a>
          </div>
          <!-- /Logo -->


          <form action="<?= url_to('register') ?>" method="post" class="mb-3">
            <?= csrf_field() ?>

            <div class="mb-2">
              <label for="email" class="form-label"><?= lang('Auth.email') ?></label>
              <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" />
              <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
            </div>

            <div class="mb-3">
              <label for="username" class="form-label"><?= lang('Auth.username') ?></label>
              <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" />
            </div>

            <div class="row">
              <div class="mb-3 form-password-toggle col-sm-6 m-0">
                <label class="form-label" for="password"><?= lang('Auth.password') ?></label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                    name="password"
                    placeholder="<?= lang('Auth.password') ?>" autocomplete="off"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <div class="mb-3 form-password-toggle col-sm-6">
                <label class="form-label" for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>"
                    name="pass_confirm"
                    placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
            </div>


            <button type="submit" class="btn btn-primary d-grid w-100"><?= lang('Auth.register') ?></button>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="<?= url_to('login') ?>">
              <span><?= lang('Auth.signIn') ?></a></span>
            </a>
          </p>
        </div>
      </div>
      <!-- Register Card -->
    </div>
  </div>
</div>

<?= $this->endSection() ?>