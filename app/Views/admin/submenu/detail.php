<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4"><?= esc($sm->submenu); ?></h1>
        <a href="<?= base_url('menu'); ?>" class="btn btn-primary mb-4">Kembali</a>
        <div class="row justify-content-center">
            <div class="col-lg-10 border border-2">
                <?= $sm->body; ?>
            </div>
        </div>

    </div>
</main>
<?= $this->endSection(); ?>