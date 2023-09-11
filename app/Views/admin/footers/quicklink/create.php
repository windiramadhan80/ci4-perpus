<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('quicklink/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control <?= (session('errors.judul')) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul') ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.judul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" class="form-control <?= (session('errors.link')) ? 'is-invalid' : '' ?>" id="link" name="link" value="<?= old('link') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.link'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>