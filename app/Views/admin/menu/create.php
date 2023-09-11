<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Menu</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('menu/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="menu" class="form-label">Menu</label>
                    <input type="text" class="form-control <?= (session('errors.menu')) ? 'is-invalid' : '' ?>" id="menu" name="menu" value="<?= old('menu') ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.menu'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Menu</button>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>