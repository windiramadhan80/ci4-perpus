<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Menu</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('menu/update/' . $m->id); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label for="menu" class="form-label">Menu</label>
                    <input type="text" class="form-control <?= (session('errors.menu')) ? 'is-invalid' : '' ?>" id="menu" name="menu" value="<?= old('menu', $m->menu) ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.menu'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ubah Menu</button>
            </form>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>