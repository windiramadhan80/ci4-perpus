<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Menu</h1>
        <div class="col-lg-6">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <a href="<?= base_url('menu/create'); ?>" class="btn btn-primary my-3">Tambah Menu</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($menu as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td class="text-uppercase"><?= esc($m->menu); ?></td>
                        <td>
                            <a href="<?= base_url('menu/edit/') . $m->id; ?>" class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="<?= base_url('menu/delete/') . $m->id; ?>" method="POST" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="badge bg-danger border-0" onclick="return confirm('Apakah yakin ingin dihapus?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h1 class="mt-5">Sub Menu</h1>
        <a href="<?= base_url('submenu/create'); ?>" class="btn btn-primary my-3">Tambah Sub Menu</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Sub Menu</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($menu as $men) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td class="text-uppercase"><?= esc($men->menu); ?></td>
                        <td>
                            <div class="list-group">
                                <?php foreach ($submenu as $sm) : ?>
                                    <?php if ($men->id == $sm->menu_id) : ?>
                                        <a href="<?= base_url('submenu/' . $sm->id); ?>" class="list-group-item list-group-item-action"><?= $sm->submenu; ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </td>
                        <td>
                            <ul class="list-group">
                                <?php foreach ($submenu as $sm) : ?>
                                    <?php if ($men->id == $sm->menu_id) : ?>
                                        <li class="list-group-item">
                                            <a href="<?= base_url('submenu/edit/') . $sm->id; ?>" class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="<?= base_url('submenu/delete/') . $sm->id; ?>" method="POST" class="d-inline">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="badge bg-danger border-0" onclick="return confirm('Apakah yakin ingin dihapus?')"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?= $this->endSection(); ?>