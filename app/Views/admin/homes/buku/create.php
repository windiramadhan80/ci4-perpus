<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Buku</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('buku-terbaru/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="nama_buku" class="form-label">Nama Buku</label>
                    <input type="text" class="form-control <?= (session('errors.nama_buku')) ? 'is-invalid' : '' ?>" id="nama_buku" name="nama_buku" value="<?= old('nama_buku') ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_buku'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook (Optional)</label>
                    <input type="text" class="form-control <?= (session('errors.facebook')) ? 'is-invalid' : '' ?>" id="facebook" name="facebook" value="<?= old('facebook') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.facebook'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter (Optional)</label>
                        <input type="text" class="form-control <?= (session('errors.twitter')) ? 'is-invalid' : '' ?>" id="twitter" name="twitter" value="<?= old('twitter') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.twitter'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram (Optional)</label>
                            <input type="text" class="form-control <?= (session('errors.instagram')) ? 'is-invalid' : '' ?>" id="instagram" name="instagram" value="<?= old('instagram') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.instagram'); ?>
                            </div>
                        </div>

                        <h6 class="mt-4">Thumbnile</h6>
                        <img src="<?= base_url('img/buku/default.jpg'); ?>" class="img-preview img-thumbnail my-2" width="120px">
                        <div class="mb-3">
                            <input type="file" class="<?= (session('errors.image')) ? 'is-invalid' : '' ?>" name="image" id="image" onchange=previewImage()>
                            <div class="invalid-feedback">
                                <?= session('errors.image'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Buku</button>
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