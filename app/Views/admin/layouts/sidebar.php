<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">ADMIN</div>
                    <a class="nav-link <?= $title == 'Dashboard' ? 'active' : ''; ?>" href="<?= base_url('dashboard'); ?>">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge-high"></i></div>
                        Dashboard
                    </a>
                    <?php if (in_groups('super_admin')) : ?>
                        <a class="nav-link <?= $title == 'User Management' ? 'active' : ''; ?>" href="<?= base_url('users'); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></i></div>
                            Users
                        </a>
                    <?php endif; ?>

                    <div class="sb-sidenav-menu-heading" style="margin-top: -15px;">FITUR</div>
                    <a class="nav-link <?= $title == 'Home' ? 'collapse' : 'collapsed'; ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHome" aria-expanded="false" aria-controls="collapseHome">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Home
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="<?= $title == 'Home' ? 'collapsed' : 'collapse'; ?>" id="collapseHome" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= (uri_string() == 'slider') ? 'active' : ''; ?>" href="/slider">Slider</a>
                            <a class="nav-link <?= uri_string() == "layanan-unggulan" ? 'active' : ''; ?>" href="/layanan-unggulan">Layanan Unggulan</a>
                            <a class="nav-link <?= uri_string() == "jurnal-langgan" ? 'active' : ''; ?>" href="/jurnal-langgan">Jurnal Yang Dilanggan</a>
                            <a class="nav-link <?= uri_string() == "ebooks" ? 'active' : ''; ?>" href="/ebooks">Layanan Ebooks</a>
                            <a class="nav-link <?= uri_string() == "berita" ? 'active' : ''; ?>" href="/berita">Berita Perpustakaan</a>
                            <a class="nav-link <?= uri_string() == "buku-terbaru" ? 'active' : ''; ?>" href="/buku-terbaru">Buku Terbaru</a>
                            <a class="nav-link <?= uri_string() == "e-resource" ? 'active' : ''; ?>" href="/e-resource">Layanan E-Resources</a>
                            <a class="nav-link <?= uri_string() == "eksternal" ? 'active' : ''; ?>" href="/eksternal">Akses Eksternal</a>
                        </nav>
                    </div>
                    <a class="nav-link <?= uri_string() == "gallery" ? 'active' : ''; ?>" href="/gallery">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-image"></i></div>
                        Gallery
                    </a>
                    <a class="nav-link <?= uri_string() == "repositori" ? 'active' : ''; ?>" href="<?= base_url('repositori'); ?>">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                        Repositori
                    </a>
                    <a class="nav-link <?= $title == 'Footer' ? 'collapse' : 'collapsed'; ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFooter" aria-expanded="false" aria-controls="collapseFooter">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-futbol"></i></div>
                        Footers
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="<?= $title == 'Footer' ? 'collapsed' : 'collapse'; ?>" id="collapseFooter" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav mb-5">
                            <a class="nav-link <?= uri_string() == "perpus" ? 'active' : ''; ?>" href="/perpus">Perpus CWE</a>
                            <a class="nav-link <?= uri_string() == "quicklink" ? 'active' : ''; ?>" href="/quicklink">Quick Links</a>
                            <a class="nav-link <?= uri_string() == "contact" ? 'active' : ''; ?>" href="/contact">Contact</a>
                        </nav>
                    </div>
                    <?php if (in_groups('super_admin')) : ?>
                        <div class="sb-sidenav-menu-heading" style="margin-top: -15px;">EDIT MENU</div>
                        <a class="nav-link <?= $title == 'Menu' ? 'collapse' : 'collapsed'; ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenu" aria-expanded="false" aria-controls="collapseMenu">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bars"></i></i></div>
                            Menu
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="<?= $title == 'Menu' ? 'collapsed' : 'collapse'; ?>" id="collapseMenu" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav mb-5">
                                <a class="nav-link <?= uri_string() == "menu" ? 'active' : ''; ?>" href="/menu">Menu</a>
                                <a class="nav-link <?= uri_string() == "single-menu" ? 'active' : ''; ?>" href="/single-menu">Single Menu</a>
                            </nav>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>