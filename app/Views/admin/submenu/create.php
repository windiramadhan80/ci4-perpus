<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Sub Menu</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('submenu/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="menu_id" class="form-label">Menu</label>
                    <select class="form-select" id="menu_id" name="menu_id">
                        <?php foreach($menu as $m) : ?>
                        <option value="<?= $m->id; ?>"><?= $m->menu; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="submenu" class="form-label">Sub Menu</label>
                    <input type="text" class="form-control <?= (session('errors.submenu')) ? 'is-invalid' : '' ?>" id="submenu" name="submenu" value="<?= old('submenu') ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.submenu'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control <?= (session('errors.slug')) ? 'is-invalid' : '' ?>" id="slug" name="slug" value="<?= old('slug') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.slug'); ?>
                    </div>
                </div>

                <textarea id="body" name="body" class="<?= (session('errors.body')) ? 'is-invalid' : '' ?>" placeholder="Silahkan Tuliskan Berita"><?= old('body') ?></textarea>


                <button type="submit" class="btn btn-primary mt-3">Tambah Sub Menu</button>
            </form>
        </div>
    </div>
</main>

<script>
    const submenu = document.querySelector('#submenu');
    const slug = document.querySelector('#slug');

    submenu.addEventListener("keyup", function() {
        let preslug = submenu.value;
        preslug = preslug.replace(/ /g, "-");
        preslug = preslug.replace(/\//g, "-");
        slug.value = preslug.toLowerCase();
    });
</script>
<?= $this->endSection(); ?>