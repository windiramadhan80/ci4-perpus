<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Perpustakaan Citra Widya Edukasi</h1>
        <div class="col-lg-6">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <a href="<?= base_url('perpus/create'); ?>" class="btn btn-primary my-3">Tambah</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">link</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($perpus as $per) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= esc($per->judul); ?></td>
                        <td><a href="<?= base_url(); ?><?= $per->link; ?>" target="_blank"><?= $per->link; ?></a></td>
                        <td>
                            <a href="<?= base_url('perpus/edit/') . $per->id; ?>" class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="<?= base_url('perpus/delete/') . $per->id; ?>" method="POST" class="d-inline">
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