<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ubah Slider</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('slider/update/' . $sliders['id']); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control <?= (session('errors.judul')) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul', $sliders['judul']) ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.judul'); ?>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="sub_judul" class="form-label">Sub Judul</label>
                    <input type="text" class="form-control <?= (session('errors.sub_judul')) ? 'is-invalid' : '' ?>" id="sub_judul" name="sub_judul" value="<?= old('sub_judul', $sliders['sub_judul']) ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.sub_judul'); ?>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" class="form-control <?= (session('errors.link')) ? 'is-invalid' : '' ?>" id="link" name="link" value="<?= old('link', $sliders['link']) ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.link'); ?>
                    </div>

                </div>
                <h6 class="mt-4">Gambar</h6>
                <input type="hidden" name="oldImage" value="<?= $sliders['image']; ?>">
                <img src="<?= base_url('img/sliders/' . $sliders['image']); ?>" class="img-preview img-thumbnail my-2" width="120px">
                <div class="mb-3">
                    <input type="file" class="<?= (session('errors.image')) ? 'is-invalid' : '' ?>" name="image" id="image" onchange=previewImage()>
                    <div class="invalid-feedback">
                        <?= session('errors.image'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Slider</button>
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