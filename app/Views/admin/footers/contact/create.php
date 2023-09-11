<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('contact/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control <?= (session('errors.judul')) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul') ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.judul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="text" class="form-control <?= (session('errors.icon')) ? 'is-invalid' : '' ?>" id="icon" name="icon" value="<?= old('icon') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.icon'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>