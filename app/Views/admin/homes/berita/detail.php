<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Berita Perpustakaan</h1>
        <?php $time = CodeIgniter\I18n\Time::parse($berita->updated_at); ?>
        <p>Last updated <?= $time->humanize(); ?></p>
        <a href="<?= base_url('berita'); ?>" class="btn btn-primary mb-4">Kembali</a>
        <div class="row justify-content-center">
            <div class="col-lg-10 border border-2">
                <?= $berita->body; ?>
            </div>
        </div>

    </div>
</main>
<?= $this->endSection(); ?>