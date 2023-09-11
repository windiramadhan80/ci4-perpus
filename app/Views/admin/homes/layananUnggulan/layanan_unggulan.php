<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Layanan Unggulan</h1>
        <div class="col-lg-6">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <a href="<?= base_url('layanan-unggulan/create'); ?>" class="btn btn-primary my-3">Tambah Layanan</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Layanan</th>
                    <th scope="col">Link Layanan</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($layananUnggulan as $lu) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= esc($lu->nama_layanan); ?></td>
                        <td><?= esc($lu->link_layanan); ?></td>
                        <td><img src="<?= base_url('img/layananUnggulan/') . $lu->image; ?>" alt="<?= $lu->nama_layanan; ?>" width="50px" title="<?= $lu->nama_layanan; ?>"></td>
                        <td>
                            <a href="<?= base_url('layanan-unggulan/edit/') . $lu->id; ?>" class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="<?= base_url('layanan-unggulan/delete/') . $lu->id; ?>" method="POST" class="d-inline">
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