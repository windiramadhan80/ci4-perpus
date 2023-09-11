use
<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <div class="row justify-content-center mt-5">
            <div class="card border-0" style="width: 18rem;">
                <p class="text-center">
                    <img src="<?= base_url('img/users/' . $user->image); ?>" class="card-img-top" style="width: 10rem; object-fit: cover; width: 200px; height: 200px; border-radius: 50%;" alt="<?= $user->username; ?>">
                </p>
                <div class="card-body">
                    <h5 class="card-title text-center fw-bold"><?= $user->fullname == null ? '-' : esc($user->fullname); ?></h5>
                    <p class="card-text text-center mb-0 fw-bold"><?= esc($user->description); ?></p>
                    <p class="card-text text-center"><?= esc($user->email); ?></p>
                    <?php $time = CodeIgniter\I18n\Time::parse($user->update); ?>
                    <p class="card-text text-center"><small class="text-muted">Last Updated <?= $time->humanize(); ?></small></p>

                    <p class="text-center">
                        <a href="<?= base_url('users'); ?>" class="btn btn-warning text-center">Kembali</a>
                        <a href="<?= base_url('users/edit/' . $user->userid); ?>" class="btn btn-primary text-center">Ubah Profil</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>