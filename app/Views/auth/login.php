<?= $this->extend('layouts/login_layout.php') ?>

<?= $this->section('content') ?>
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register Card -->
      <div class="card">
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
          <?= view('Myth\Auth\Views\_message_block') ?>

          <form action="<?= url_to('login') ?>" method="post" class="mb-3">
            <?= csrf_field() ?>

            <?php if ($config->validFields === ['email']): ?>
            <div class="mb-3">
              <label for="login" class="form-label"><?= lang('Auth.email') ?></label>
              <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="login" name="login" placeholder="<?= lang('Auth.email') ?>" />
            </div>
            <div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
            <?php else: ?>
            <div class="mb-3">
              <label for="login" class="form-label"><?= lang('Auth.emailOrUsername') ?></label>
              <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="login" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" />
            </div>
            <div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
            <?php endif; ?>

            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password"><?= lang('Auth.password') ?></label>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                  name="password"
                  placeholder="<?= lang('Auth.password') ?>"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              <div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
            </div>
            
            <div class="mb-3">
            <?php if ($config->allowRemembering): ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?> />
                <label class="form-check-label" for="terms-conditions"> 
                <?= lang('Auth.rememberMe') ?>
                 
                </label>
              </div>
              <?php endif; ?>
            </div>
            
            <button type="submit" class="btn btn-primary d-grid w-100"><?= lang('Auth.loginAction') ?></button>
          </form>
          <p class="text-center">
            <span>Don't have an account?</span>
            <a href="<?= url_to('register') ?>">
              <span>Register here</span>
            </a>
          </p>
        </div>
      </div>
      <!-- Register Card -->
    </div>
  </div>
</div>

<!-- / Content -->


<?= $this->endSection() ?>