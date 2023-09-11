<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <center><br>
                <h2><span style="color: #003973;">Berita</span> <span style="color: #ff3300;">Perpustakaan</span></h2></br>
            </center>
        </div>
        <div class="row g-4 justify-content-center">
            <?php foreach ($berita as $ber) : ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('img/berita/' . $ber->image); ?>" alt="<?= $ber->judul; ?>">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="<?= base_url('home/berita/' . $ber->slug); ?>" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="https://digilib.poltekcwe.ac.id/index.php?p=daftar_online" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;" target="_blank">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4"><?= $ber->judul; ?></h5>
                        </div>
                        <div class="d-flex border-top">
                            <?php $time = CodeIgniter\I18n\Time::parse($ber->updated_at); ?>
                            <small class="text-muted"><i class="fa fa-clock-o"></i> Last Updated <?= $time->humanize(); ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>