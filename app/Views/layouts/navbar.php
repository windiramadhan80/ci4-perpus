<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="<?= base_url(); ?>" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>img/logo-perpustakaan.png" alt="" height="200" width="200" class="img-fluid"></a>
        <h5 class="m-0 text-primary"></h5>

    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="<?= base_url(); ?>" class="nav-item nav-link">Home</a>

            <?php foreach ($menu as $m) : ?>
                <div class="nav-item dropdown">
                    <a href="<?= base_url(); ?>" class="nav-link" data-bs-toggle="dropdown"><?= $m->menu; ?></a>
                    <div class="dropdown-menu rounded-0 m-0">

                        <?php foreach ($submenu as $sm) : ?>
                            <?php if ($m->id == $sm->menu_id) : ?>
                                <a href="<?= base_url('home/menu/' . $sm->slug); ?>" class="dropdown-item text-uppercase"><?= $sm->submenu; ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            <?php endforeach; ?>

            <?php foreach ($singleMenu as $smm) : ?>
                <a href="<?= base_url('home/single-menu/' . $smm->slug); ?>" class="nav-item nav-link"><?= $smm->single_menu; ?></a>
            <?php endforeach; ?>

            <a href="<?= base_url(); ?>galeri" class="nav-item nav-link">Galeri</a>
            <?php if (logged_in()) : ?>
                <a href="<?= base_url('dashboard'); ?>" class="nav-item nav-link" target="_blank">Dashboard</a>
            <?php else : ?>
                <a href="<?= base_url('login'); ?>" class="nav-item nav-link" target="_blank">Pustakawan</a>
            <?php endif; ?>
        </div>
        <?php foreach($repositories as $repo) : ?>
        <a href="<?= $repo->link_repository; ?>" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block" target="_blank">Repository<i class="fa fa-arrow-right ms-3"></i></a>
        <?php endforeach; ?>
    </div>
</nav>