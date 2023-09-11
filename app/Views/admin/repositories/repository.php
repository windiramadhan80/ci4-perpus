<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Repositori Poltek CWE</h1>
        <div class="col-lg-6">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <h5 class="mt-4">Klik Untuk Mencoba Tombol Dibawah</h5>
        <?php foreach ($repositories as $r) : ?>
            <a href="<?= $r->link_repository; ?>" class="btn btn-success" target="_blank"><?= $r->link_repository; ?></a>
            <h5 class="mt-4">Silahkan Klik Tombol Ubah Link Untuk Mengubahnya</h5>
            <a href="<?= base_url('repositori/edit/' . $r->id); ?>" class="btn btn-warning">Ubah Link</a>
        <?php endforeach; ?>
    </div>
</main>
<?= $this->endSection(); ?>