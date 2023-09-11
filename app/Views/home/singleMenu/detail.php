<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<main style="min-height: 450px">
    <div style="margin-top: 20px;margin-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="margin-top: 20px;">
                        <div>
                            <?= $detailSingleMenu->body; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>