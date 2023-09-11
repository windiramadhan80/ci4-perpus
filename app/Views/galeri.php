<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <center><br>
                <h2><span style="color: #003973;">Galeri</span> <span style="color: #ff3300;">Perpustakaan Politeknik Citra Widya Edukasi</span></h2></br>
            </center>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($galleries as $gallery) : ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('img/galleries/' . $gallery->image); ?>" alt="<?= $gallery->nama_gallery; ?>">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4"></div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4"><?= $gallery->nama_gallery; ?></h5>
                        </div>
                        <div class="d-flex border-top">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>