<?= $this->extend('template_login'); ?>
<?= $this->section('content'); ?>

<div id="app">

    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <!-- <div class="login-brand">
                        <img src="<?php base_url() ?>/stisla/assets/img/icons.png" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div> -->

                    <div class="card card-primary">
                        <div class="card-header justify-content-center">
                            <h4>Login</h4>
                        </div>

                        <div class="card-body">

                            <?php if (session()->getFlashdata('error')) : ?>

                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">x</button>
                                        <b>Error !</b>
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                </div>

                            <?php endif; ?>

                            <?php if (session()->getFlashdata('success')) : ?>

                                <div class="alert alert-success alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">x</button>
                                        <b>Success !</b>
                                        <?= session()->getFlashdata('success') ?>
                                    </div>
                                </div>

                            <?php endif; ?>

                            <form method="POST" action="loginProcess" class="was-validated">

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email_user" placeholder="Masukkan Email Anda" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password_user" placeholder="Masukkan Password Anda" minlength="8" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" id="remember-me" <?php if (isset($_COOKIE["loginId"])) { ?> checked="checked" <?php } ?>>
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div> -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; CMS 2021
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>