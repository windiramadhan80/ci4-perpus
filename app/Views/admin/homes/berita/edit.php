<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Berita</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('berita/update/' . $berita->id); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control <?= (session('errors.judul')) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul', $berita->judul) ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.judul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control <?= (session('errors.slug')) ? 'is-invalid' : '' ?>" id="slug" name="slug" value="<?= old('slug', $berita->slug) ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.slug'); ?>
                    </div>
                </div>

                <textarea id="body" name="body" class="<?= (session('errors.body')) ? 'is-invalid' : '' ?>" placeholder="Silahkan Tuliskan Berita"><?= old('body', $berita->body) ?></textarea>

                <h6 class="mt-4">Thumbnile</h6>
                <input type="hidden" name="oldImage" value="<?= $berita->image; ?>">
                <img src="<?= base_url('img/berita/' . $berita->image); ?>" class="img-preview img-thumbnail my-2" width="120px">
                <div class="mb-3">
                    <input type="file" class="<?= (session('errors.image')) ? 'is-invalid' : '' ?>" name="image" id="image" onchange=previewImage()>
                    <div class="invalid-feedback">
                        <?= session('errors.image'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Berita</button>
            </form>
        </div>
    </div>
</main>

<script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener("keyup", function() {
        let preslug = judul.value;
        preslug = preslug.replace(/ /g, "-");
        preslug = preslug.replace(/\//g, "-");
        slug.value = preslug.toLowerCase();
    });

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
<?= $this->endSection(); ?>