<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Akses Eksternal</h1>
        <div class="col-lg-6">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <a href="<?= base_url('eksternal/create'); ?>" class="btn btn-primary my-3">Tambah Akses</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Akses</th>
                    <th scope="col">Link Akses</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($eksternals as $eksternal) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= esc($eksternal->nama_eksternal); ?></td>
                        <td><?= esc($eksternal->link_eksternal); ?></td>
                        <td><img src="<?= base_url('img/eksternals/') . $eksternal->image; ?>" alt="<?= $eksternal->nama_eksternal; ?>" width="50px" title="<?= $eksternal->nama_eksternal; ?>"></td>
                        <td>
                            <a href="<?= base_url('eksternal/edit/') . $eksternal->id; ?>" class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="<?= base_url('eksternal/delete/') . $eksternal->id; ?>" method="POST" class="d-inline">
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