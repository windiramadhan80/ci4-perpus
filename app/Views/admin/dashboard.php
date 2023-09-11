<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Selamat Datang <?= (user()->name == null) ? esc(user()->username) : esc(user()->name); ?></h1>
        <ol class="breadcrumb mb-4 fs-5">
            <li class="breadcrumb-item active">Anda Masuk Sebagai <?= esc($users->description); ?></li>
        </ol>
        <div class="card mb-3" style="max-width: 640px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= base_url('img/users/' . user()->image); ?>" class="img-fluid rounded-start" style="object-fit: cover; width: 100%; height: 200px;" alt="<?= user()->name; ?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">Perpustakaan Citra Widya Edukasi</h4>
                        <h5 class="card-title mt-4"><?= (user()->name == null) ? esc(user()->username) : esc(user()->name); ?></h5>
                        <p class="card-text"><?= esc(user()->email); ?></p>
                        <p class="card-text"><small class="text-muted">Last Updated <?= user()->updated_at->humanize(); ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>