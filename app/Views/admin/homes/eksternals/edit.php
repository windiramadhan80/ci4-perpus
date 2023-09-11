<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Akses</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('eksternal/update/' . $eksternal->id); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label for="nama_eksternal" class="form-label">Nama Akses</label>
                    <input type="text" class="form-control <?= (session('errors.nama_eksternal')) ? 'is-invalid' : '' ?>" id="nama_eksternal" name="nama_eksternal" value="<?= old('nama_eksternal', $eksternal->nama_eksternal) ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_eksternal'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="link_eksternal" class="form-label">Link Akses</label>
                    <input type="text" class="form-control <?= (session('errors.link_eksternal')) ? 'is-invalid' : '' ?>" id="link_eksternal" name="link_eksternal" value="<?= old('link_eksternal', $eksternal->link_eksternal) ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.link_eksternal'); ?>
                    </div>
                </div>

                <h6 class="mt-4">Thumbnile</h6>
                <input type="hidden" name="oldImage" value="<?= $eksternal->image; ?>">
                <img src="<?= base_url('img/eksternals/' . $eksternal->image); ?>" class="img-preview img-thumbnail my-2" width="120px">
                <div class="mb-3">
                    <input type="file" class="<?= (session('errors.image')) ? 'is-invalid' : '' ?>" name="image" id="image" onchange=previewImage()>
                    <div class="invalid-feedback">
                        <?= session('errors.image'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Akses</button>
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