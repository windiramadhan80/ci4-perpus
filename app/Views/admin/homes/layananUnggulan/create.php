<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Layanan</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('layanan-unggulan/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="nama_layanan" class="form-label">Nama Layanan</label>
                    <input type="text" class="form-control <?= (session('errors.nama_layanan')) ? 'is-invalid' : '' ?>" id="nama_layanan" name="nama_layanan" value="<?= old('nama_layanan') ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_layanan'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="link_layanan" class="form-label">Link Layanan</label>
                    <input type="text" class="form-control <?= (session('errors.link_layanan')) ? 'is-invalid' : '' ?>" id="link_layanan" name="link_layanan" value="<?= old('link_layanan') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.link_layanan'); ?>
                    </div>
                </div>

                <h6 class="mt-4">Thumbnile</h6>
                <img src="<?= base_url('img/layananUnggulan/default.jpg'); ?>" class="img-preview img-thumbnail my-2" width="120px">
                <div class="mb-3">
                    <input type="file" class="<?= (session('errors.image')) ? 'is-invalid' : '' ?>" name="image" id="image" onchange=previewImage()>
                    <div class="invalid-feedback">
                        <?= session('errors.image'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Layanan</button>
            </form>
        </div>
    </div>
</main>

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
<?= $this->endSection(); ?>