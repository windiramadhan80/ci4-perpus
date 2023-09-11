<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Menu</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('single-menu/update/' . $smm->id); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-3">
                    <label for="single_menu" class="form-label">Single Menu</label>
                    <input type="text" class="form-control <?= (session('errors.single_menu')) ? 'is-invalid' : '' ?>" id="single_menu" name="single_menu" value="<?= old('single_menu', $smm->single_menu) ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.single_menu'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control <?= (session('errors.slug')) ? 'is-invalid' : '' ?>" id="slug" name="slug" value="<?= old('slug', $smm->slug) ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.slug'); ?>
                    </div>
                </div>

                <textarea id="body" name="body" class="<?= (session('errors.body')) ? 'is-invalid' : '' ?>" placeholder="Silahkan Tuliskan Berita"><?= old('body', $smm->body) ?></textarea>

                <button type="submit" class="btn btn-primary mt-3">Ubah Sub Menu</button>
            </form>
        </div>
    </div>
</main>

<script>
    const single_menu = document.querySelector('#single_menu');
    const slug = document.querySelector('#slug');

    single_menu.addEventListener("keyup", function() {
        let preslug = single_menu.value;
        preslug = preslug.replace(/ /g, "-");
        preslug = preslug.replace(/\//g, "-");
        slug.value = preslug.toLowerCase();
    });
</script>

<?= $this->endSection(); ?>