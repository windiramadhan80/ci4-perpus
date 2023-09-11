<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
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
                            <div class="card shadow-lg border-0 rounded-lg my-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Ubah Profil</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('users/update/') . $user->userid; ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="form-floating mb-1">
                                            <input class="form-control <?= (session('errors.name')) ? 'is-invalid' : '' ?>" id="name" name="name" type="name" placeholder="<?= lang('Auth.name') ?>" value="<?= old('name', $user->fullname) ?>" />
                                            <label for="name">Nama Lengkap</label>
                                            <div class="invalid-feedback">
                                                <?= session('errors.name'); ?>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-1">
                                            <input class="form-control <?= (session('errors.email')) ? 'is-invalid' : '' ?>" id="email" name="email" type="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email', $user->email) ?>" />
                                            <label for="email"><?= lang('Auth.email') ?></label>
                                            <div class="invalid-feedback">
                                                <?= session('errors.email'); ?>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input class="form-control <?= (session('errors.username')) ? 'is-invalid' : '' ?>" id="username" name="username" type="text" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username', $user->username) ?>" />
                                            <label for="username"><?= lang('Auth.username') ?></label>
                                            <div class="invalid-feedback">
                                                <?= session('errors.username'); ?>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <select class="form-select" id="group_id" name="group_id">
                                                <option value="1" <?= $user->description == 'Super Admin' ? 'selected' : ''; ?>>Super Admin</option>
                                                <option value="2" <?= $user->description == 'Administrator' ? 'selected' : ''; ?>>Administrator</option>
                                            </select>
                                        </div>

                                        <h6 class="mt-2">Foto</h6>
                                        <input type="hidden" name="oldImage" value="<?= $user->image; ?>">
                                        <img src="<?= base_url('img/users/') . $user->image; ?>" class="img-preview img-thumbnail my-2" width="80px">
                                        <div class="mb-1">
                                            <input type="file" class="<?= (session('errors.image')) ? 'is-invalid' : '' ?>" name="image" id="image" onchange=previewImage()>
                                            <div class="invalid-feedback">
                                                <?= session('errors.image'); ?>
                                            </div>
                                        </div>
                                        <div class="mt-2 mb-0">
                                            <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Ubah Profil</button></div>
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
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>js/scripts.js"></script>
</body>

</html>