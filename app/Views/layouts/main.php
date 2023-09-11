<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url(); ?>img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url(); ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url(); ?>css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <?= $this->include('layouts/navbar'); ?>

        <?= $this->renderSection('content'); ?>



        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Perpustakaan Politeknik Citra Widya Edukasi</h5>
                        <?php foreach($perpus as $per) : ?>
                        <a class="btn btn-link text-white-50" href="<?= base_url($per->link); ?>" target="_blank"><?= $per->judul; ?></a>
                        <?php endforeach; ?>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <?php foreach($quicklink as $ql) : ?>
                        <a class="btn btn-link text-white-50" href="<?= base_url($ql->link); ?>" target="_blank"><?= $ql->judul; ?></a>
                        <?php endforeach; ?>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <?php foreach($contact as $ct) : ?>
                        <p class="mb-2"><i class="<?= $ct->icon; ?>"></i> <?= $ct->judul; ?></p>
                        <?php endforeach; ?>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://twitter.com/politeknikCWE" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/politeknikcitrawidyaedukasi" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/@politeknikcitrawidyaedukas5633" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/company/politeknik-kelapa-sawit-citra-widya-edukasi/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Cari</h5>
                        <p>Masukkan satu atau lebih kata kunci dari judul, pengarang, atau subjek</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <form action="https://digilib.poltekcwe.ac.id" method="get" target="_blank">
                                <input type="text" placeholder="Cari buku disini..." class="form-control search" id="searchForm" name="keywords" value="" aria-hidden="true" autocomplete="off" lang="en_US">
                                <button class="btn btn-primary py-2 mt-2 me-2" name="search" type="submit" value="search">Cari Koleksi</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            <p class="text-center" style="margin: 0;">Copyright &copy; Perpustakaan Citra Widya Edukasi <?= date('Y'); ?></p>
                            <p class="text-center" style="margin: 0;">Powered By: <a href="">Nastain</a> & <a href="">Windi Ramadhan</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>lib/wow/wow.min.js"></script>
    <script src="<?= base_url(); ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url(); ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url(); ?>lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url(); ?>js/main.js"></script>
</body>

</html>