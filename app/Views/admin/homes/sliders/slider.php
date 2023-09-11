<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sliders</h1>

        <div class="col-lg-6">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>

        <a href="<?= base_url('slider/create'); ?>" class="btn btn-primary my-3">Tambah Slider</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Sub Judul</th>
                    <th scope="col">Link</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($sliders as $slider) : ?>
                    <tr>
                        <!-- esc( -->
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= esc($slider->judul); ?></td>
                        <td><?= esc($slider->sub_judul); ?></td>
                        <td><?= esc($slider->link); ?></td>
                        <td><img src="<?= base_url('img/sliders/' . $slider->image); ?>" alt="" width="50px" title="<?= $slider->judul; ?>"></td>
                        <td>
                            <a href="<?= base_url('slider/edit/' . $slider->id); ?>" class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="<?= base_url('slider/delete/' . $slider->id); ?>" method="POST" class="d-inline">
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