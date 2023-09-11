<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Link Repositori</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('repositori/update/' . $r->id); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label for="link_repository" class="form-label">Link Repositori</label>
                    <input type="text" class="form-control <?= (session('errors.link_repository')) ? 'is-invalid' : '' ?>" id="link_repository" name="link_repository" value="<?= old('link_repository', $r->link_repository) ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.link_repository'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Link</button>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>