<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">

        <?php foreach ($sliders as $slider) : ?>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="<?= base_url('img/sliders/' . $slider->image); ?>" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4"><?= $slider->judul; ?></h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2"><?= $slider->sub_judul; ?></p>
                                <a href="<?= $slider->link; ?>" target="_blank" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
<!-- Carousel End -->

<!-- Search Start -->
<br>
<center>
    <section>
        <div class="wrap-content shadow-sm pad-10 d-block con-src">
            <div class="txtcenter fs30 f-bold mar-t-5 mar-b-10"><a class="cur-pointer"><img src="<?= base_url(); ?>img/logo-sikoper.png" width="180px"><strong>
                        <h4>Sistem Integrasi Koleksi Perpustakaan Politeknik Citra Widya Edukasi (SIKOPER)
                    </strong></h4></a></div>
            <div class="row mar-t-10 mar-lr10">
                <div class="col-md-12 col-sm-12 pad-lr-2 mar-tb-5"></div>
            </div>
            </form>
        </div>
    </section>
</center></br>

<div class="avia_textblock  " itemprop="text">
    <h3 style="text-align: center;"><span style="color: #ff3300;">Mencari sesuatu?</span> <span style="color: #ff3300;"></span></h3>
    <div class="avia_textblock  " itemprop="text">
        <h5 style="text-align: center;"><span style="color: #003973;">Masukan kata kunci, judul, pengarang, atau subjek</span> <span style="color: #ff3300;"></span></h5>
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-5">
                    <div class="col-md-50">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <form action="https://digilib.poltekcwe.ac.id/" method="get" autocomplete="off" target="_blank">
                                    <input type="text" placeholder="Cari koleksi disini..." class="form-control search" id="searchForm" name="keywords" value="" aria-hidden="true" autocomplete="off" lang="en_US">
                                    <span class="input-group-btn d-flex justify-content-center mt-2">
                                        <button class="s-btn animated fadeInUp delay4" name="search" type="submit" value="search">Pencarian</button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 about-bg rounded overflow-hidden">
                    <div class="col-6 text-start">
                        <img class="img-fluid w-100" src="<?= base_url(); ?>img/about-1.jpg">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid" src="<?= base_url(); ?>img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid" src="<?= base_url(); ?>img/about-3.jpg" style="width: 85%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid w-100" src="<?= base_url(); ?>img/about-4.jpg">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">Sejarah Perpustakaan Politeknik Citra Widya Edukasi</h1>
                <strong>
                    <p style="text-align: justify;"><span class="av_dropcap1 ">P</span>erpustakaan Politeknik Citra Widya Edukasi merupakan pusat penyedia literatur untuk mendukung civitas akademika yang mekanisme pembinaannya dilakukan oleh WADIR I / Bidang Akademik. Sejalan dengan UU RI No. 2 Tahun 1989 tentang Sistem Pendidikan Nasional.Tujuan Perpustakaan Politeknik Citra Widya Edukasi adalah mendukung pelaksanaan pengajaran, penelitian dan pengabdian pada masyarakat.Dewasa ini, seiring dengan perkembangan teknologi informasi, Perpustakaan Politeknik Citra Widya Edukasi menerapkan sistem pelayanan open access yang didukung oleh OPAC (online public access catalogue) secara terintegrasi dengan Perpustakaan Politeknik Citra Widya Edukasi di seluruh indonesia, dilengkapi dengan fitur-fitur penunjang layanan perpustakan.&nbsp;<strong>Pusat Sumber Belajar.</strong>&nbsp;<strong>(PSB)</strong>&nbsp;</p>
                </strong>
                <a class="btn btn-primary py-3 px-3 mt-3" href="https://poltekcwe.ac.id/tentang/sejarah-politeknik-kelapa-sawit-citra-widya-edukasi.html" target="_blank">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<div class="container">
    <div class="section-title center-block text-center">
        <img class="thing" src="<?= base_url(); ?>img/logopoliteknik.png" alt="" width="100">
    </div>
</div>

<br>
<div class="avia_textblock  " itemprop="text">
    <h1 style="text-align: center;"><span style="color: #003973;">LAYANAN</span> <span style="color: #ff3300;">UNGGULAN</span></h1>
</div></br>

<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($layananUnggulan as $lu) : ?>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <center>
                        <div class="col-lg-2">
                            <div class="icon">
                                <a href="<?= $lu->link_layanan; ?>" target="_blank"><img src="<?= base_url('img/layananUnggulan/' . $lu->image); ?>" alt="<?= $lu->nama_layanan; ?>" width="150" title="<?= $lu->nama_layanan; ?>"></a>
                            </div>
                        </div>
                    </center>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Category End -->

<div class="avia_textblock" itemprop="text">
    <h3 style="text-align: center;"><span style="color: #0A11EF;">E-Journal Yang dilanggan</span> <span style="color: #F8C802;">Politeknik Citra Widya Edukasi</span></h3>
</div>

<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($jurnals as $jurnal) : ?>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <center>
                        <div class="col-lg-2">
                            <div class="icon">
                                <a href="<?= $jurnal->link_jurnal; ?>" target="_blank"><img src="<?= base_url('img/jurnals/' . $jurnal->image); ?>" alt="<?= $jurnal->nama_jurnal; ?>" width="140" title="<?= $jurnal->nama_jurnal; ?>"></a>
                            </div>
                        </div>
                    </center>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Category End -->

<div class="avia_textblock" itemprop="text">
    <h1 style="text-align: center;"><span style="color: #003973;">LAYANAN</span> <span style="color: #F307D4;">EBOOKS</span></h1>
</div>

<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($ebooks as $ebook) : ?>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <center>
                        <div class="col-lg-2">
                            <div class="icon"><a href="<?= $ebook->link_ebook; ?>" target="_blank"><img src="<?= base_url('img/ebooks/' . $ebook->image); ?>" alt="<?= $ebook->nama_ebook; ?>" width="120" title="<?= $ebook->nama_ebook; ?>"></a></div>
                        </div>
                    </center>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Category End -->

<!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <br>
            <h1><span style="color: #003973;">BERITA</span> <span style="color: #ff3300;">PERPUSTAKAAN</span></h1></br>
        </div>
        <div class="row g-4 justify-content-center">
            <?php foreach ($berita as $ber) : ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('img/berita/' . $ber['image']); ?>" alt="<?= $ber['judul']; ?>">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="<?= base_url('home/berita/' . $ber['slug']); ?>" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="https://digilib.poltekcwe.ac.id/index.php?p=daftar_online" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;" target="_blank">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4"><?= $ber['judul']; ?></h5>
                        </div>
                        <div class="d-flex border-top">
                            <?php $time = CodeIgniter\I18n\Time::parse($ber['updated_at']); ?>
                            <small class="text-muted"><i class="fa fa-clock-o"></i>Last Updated <?= $time->humanize(); ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<center><a class="btn btn-primary py-3 px-3 mt-3" href="<?= base_url(); ?>beritalainnya">Berita lainnya</a></center>
<!-- Courses End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <br>
            <div class="avia_textblock  " itemprop="text">
                <h1 style="text-align: center;"><span style="color: #003973;">BUKU</span> <span style="color: #ff3300;">TERBARU</span></h1></br>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <?php foreach($buku as $buk) : ?>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <center>
                            <a href="http://perpustakaan.poltekcwe.ac.id" class="text-center" target="_blank"><img class="img-fluid " src="<?= base_url('img/buku/' . $buk->image); ?>" alt="<?= $buk->nama_buku; ?>" height="200" width="200"></a>
                        </center>
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href="<?= $buk->facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="<?= $buk->twitter; ?>"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="<?= $buk->instagram; ?>"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0"><?= $buk->nama_buku; ?></h5>
                        <?php $time = CodeIgniter\I18n\Time::parse($buk->updated_at); ?>
                        <small><?= $time->humanize(); ?></small>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3"></h6>
            <br>
            <div class="avia_textblock  " itemprop="text">
                <h1 style="text-align: center;"><span style="color: #003973;">LAYANAN</span> <span style="color: #ff3300;">E-Resources </span></h1></br>
            </div>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
        <?php foreach($eResource as $er) : ?>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="<?= base_url('img/eResources/' . $er->image); ?>" style="width: 100px; height: 100px;">
                <a href="{{ $le->linkeresource }}" target="_blank">
                    <h5 class="mb-0"><?= $er->nama_eresource; ?></h5>
                </a>
                <p></p>
                <div class="testimonial-text bg-light text-center p-4">
                </div>
            </div>
        <?php endforeach ; ?>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<br>
<div style="background-color:#ffffff;padding:20px 0px;" class="mb-4"></div></br>

<div class="container">
    <div class="row">
        <div class="mb-2 col-sm-12">
            <legend class="text-center text-black"><strong><span class="fa fa-external-link"></span> Akses Eksternal</strong></legend>
        </div>
    </div>
    <center>
        <div class="row">
        <?php foreach($eksternal as $ek) : ?>
            <div class="mb-2 col-sm">
                <a href="<?= $ek->link_eksternal; ?>" target="_blank">
                    <img src="<?= base_url('img/eksternals/' . $ek->image); ?>" alt="<?= $ek->nama_eksternal; ?>" style="width: 200px;">
                </a>
            </div>
            <?php endforeach ; ?>
        </div>
    </center>
</div>
<?= $this->endSection(); ?>