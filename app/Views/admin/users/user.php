<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Users</h1>

        <div class="col-lg-6">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <a href="<?= base_url('register'); ?>" class="btn btn-primary my-3">Tambah Akun</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Image</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $user->fullname == null ? '-' : esc($user->fullname); ?></td>
                        <td><?= esc($user->username); ?></td>
                        <td><?= esc($user->description); ?></td>
                        <td><img style="width: 30px;" src="<?= base_url('img/users/') . $user->image; ?>"></td>
                        <td>
                            <a href="<?= base_url('users/' . $user->userid); ?>" class="badge bg-primary"><i class="fa-solid fa-eye"></i></a>
                            <a href="<?= base_url('users/edit/' . $user->userid); ?>" class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="<?= base_url('users/delete/' . $user->userid); ?>" method="POST" class="d-inline">
                                <?= csrf_field() ?>
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