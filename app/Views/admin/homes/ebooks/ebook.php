<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Layanan Ebooks</h1>
        <div class="col-lg-6">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <a href="<?= base_url('ebooks/create'); ?>" class="btn btn-primary my-3">Tambah Ebook</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Ebook</th>
                    <th scope="col">Link Ebook</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($ebooks as $ebook) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= esc($ebook->nama_ebook); ?></td>
                        <td><?= esc($ebook->link_ebook); ?></td>
                        <td><img src="<?= base_url('img/ebooks/') . $ebook->image; ?>" alt="<?= $ebook->nama_ebook; ?>" width="50px" title="<?= $ebook->nama_ebook; ?>"></td>
                        <td>
                            <a href="<?= base_url('ebooks/edit/') . $ebook->id; ?>" class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="<?= base_url('ebooks/delete/') . $ebook->id; ?>" method="POST" class="d-inline">
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