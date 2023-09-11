<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4"><?= esc($smm->single_menu); ?></h1>
        <a href="<?= base_url('single-menu'); ?>" class="btn btn-primary mb-4">Kembali</a>
        <div class="row justify-content-center">
            <div class="col-lg-10 border border-2">
                <?= $smm->body; ?>
            </div>
        </div>

    </div>
</main>
<?= $this->endSection(); ?>