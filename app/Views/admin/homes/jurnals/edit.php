<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Jurnal</h1>
        <div class="col-lg-8">
            <form action="<?= base_url('jurnal-langgan/update/' . $jurnal->id); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label for="nama_jurnal" class="form-label">Nama Jurnal</label>
                    <input type="text" class="form-control <?= (session('errors.nama_jurnal')) ? 'is-invalid' : '' ?>" id="nama_jurnal" name="nama_jurnal" value="<?= old('nama_jurnal', $jurnal->nama_jurnal) ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_jurnal'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="link_jurnal" class="form-label">Link Jurnal</label>
                    <input type="text" class="form-control <?= (session('errors.link_jurnal')) ? 'is-invalid' : '' ?>" id="link_jurnal" name="link_jurnal" value="<?= old('link_jurnal', $jurnal->link_jurnal) ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.link_jurnal'); ?>
                    </div>
                </div>

                <h6 class="mt-4">Thumbnile</h6>
                <input type="hidden" name="oldImage" value="<?= $jurnal->image; ?>">
                <img src="<?= base_url('img/jurnals/' . $jurnal->image); ?>" class="img-preview img-thumbnail my-2" width="120px">
                <div class="mb-3">
                    <input type="file" class="<?= (session('errors.image')) ? 'is-invalid' : '' ?>" name="image" id="image" onchange=previewImage()>
                    <div class="invalid-feedback">
                        <?= session('errors.image'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Jurnal</button>
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