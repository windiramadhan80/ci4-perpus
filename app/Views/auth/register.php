<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Admin</title>
    <link href="<?= base_url(); ?>css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow-lg border-0 rounded-lg my-4">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-3"><?= lang('Auth.register') ?></h3>
                                </div>
                                <div class="card-body">
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <form action="<?= url_to('register') ?>" method="post">
                                        <?= csrf_field() ?>

                                        <div class="form-floating mb-1">
                                            <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" type="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" />
                                            <label for="email"><?= lang('Auth.email') ?></label>
                                        </div>

                                        <div class="form-floating mb-1">
                                            <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" type="text" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" />
                                            <label for="username"><?= lang('Auth.username') ?></label>
                                        </div>

                                        <div class="form-floating mb-1">
                                            <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" name="password" type="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" />
                                            <label for="password"><?= lang('Auth.password') ?></label>
                                        </div>
                                        <div class="form-floating mb-1">
                                            <input class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="pass_confirm" name="pass_confirm" type="password" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" />
                                            <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                        </div>

                                        <div class="mt-2 mb-0">
                                            <div class="d-grid"><button class="btn btn-primary btn-block" type="submit"><?= lang('Auth.register') ?></button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">Copyright &copy; Perpustakaan Citra Widya Edukasi <?= date('Y'); ?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>js/scripts.js"></script>
</body>

</html>