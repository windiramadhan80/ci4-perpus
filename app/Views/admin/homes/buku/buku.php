<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Buku Terbaru</h1>
        <div class="col-lg-6">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <a href="<?= base_url('buku-terbaru/create'); ?>" class="btn btn-primary my-3">Tambah Buku</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Sosial Media</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($buku as $buk) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= esc($buk->nama_buku); ?></td>
                        <td>
                            <a href="<?= $buk->facebook; ?>" class="fs-5"><i class="fa-brands fa-facebook"></i></a>
                            <a href="<?= $buk->twitter; ?>" class="fs-5"><i class="fa-brands fa-twitter"></i></a>
                            <a href="<?= $buk->instagram; ?>" class="fs-5"><i class="fa-brands fa-instagram"></i></a>
                        </td>
                        <td><img src="<?= base_url('img/buku/' . $buk->image); ?>" alt="<?= $buk->nama_buku; ?>" width="50px" title="<?= $buk->nama_buku; ?>"></td>
                        <td>
                            <a href="<?= base_url('buku-terbaru/edit/' . $buk->id); ?>" class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="<?= base_url('buku-terbaru/delete/' . $buk->id); ?>" method="POST" class="d-inline">
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