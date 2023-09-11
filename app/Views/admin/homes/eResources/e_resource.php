<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Layanan E-Resource</h1>
        <div class="col-lg-6">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <a href="<?= base_url('e-resource/create'); ?>" class="btn btn-primary my-3">Tambah E-Resource</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama E-Resource</th>
                    <th scope="col">Link E-Resource</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($eResources as $er) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= esc($er->nama_eresource); ?></td>
                        <td><?= esc($er->link_eresource); ?></td>
                        <td><img src="<?= base_url('img/eResources/') . $er->image; ?>" alt="<?= $er->nama_eresource; ?>" width="50px" title="<?= $er->nama_eresource; ?>"></td>
                        <td>
                            <a href="<?= base_url('e-resource/edit/') . $er->id; ?>" class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="<?= base_url('e-resource/delete/') . $er->id; ?>" method="POST" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="badge bg-danger border-0" onclick="return confirm('Apakah yakin ingin dihapus?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?= $this->endSection(); ?>