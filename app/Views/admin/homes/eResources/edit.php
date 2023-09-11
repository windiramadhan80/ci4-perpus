<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit E-Resource</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('e-resource/update/' . $er->id); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label for="nama_eresource" class="form-label">Nama E-Resource</label>
                    <input type="text" class="form-control <?= (session('errors.nama_eresource')) ? 'is-invalid' : '' ?>" id="nama_eresource" name="nama_eresource" value="<?= old('nama_eresource', $er->nama_eresource) ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_eresource'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="link_eresource" class="form-label">Link E-Resource</label>
                    <input type="text" class="form-control <?= (session('errors.link_eresource')) ? 'is-invalid' : '' ?>" id="link_eresource" name="link_eresource" value="<?= old('link_eresource', $er->link_eresource) ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.link_eresource'); ?>
                    </div>
                </div>

                <h6 class="mt-4">Thumbnile</h6>
                <input type="hidden" name="oldImage" value="<?= $er->image; ?>">
                <img src="<?= base_url('img/eResources/' . $er->image); ?>" class="img-preview img-thumbnail my-2" width="120px">
                <div class="mb-3">
                    <input type="file" class="<?= (session('errors.image')) ? 'is-invalid' : '' ?>" name="image" id="image" onchange=previewImage()>
                    <div class="invalid-feedback">
                        <?= session('errors.image'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah E-Resource</button>
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