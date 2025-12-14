<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<h4 class="mb-3">Data Mahasiswa</h4>

<a href="/mahasiswa/tambah" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah Mahasiswa
</a>

<?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('pesan') ?>
    </div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-bordered" id="tableMahasiswa">
            <thead class="table-dark">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th width="140">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($list as $r): ?>
                <tr>
                    <td><?= esc($r['nim']) ?></td>
                    <td><?= esc($r['nama']) ?></td>
                    <td><?= esc($r['jenis_kelamin']) ?></td>
                    <td><?= esc($r['email']) ?></td>
                    <td>
                        <?php if($r['foto']): ?>
                            <img src="/uploads/foto_mahasiswa/<?= esc($r['foto']) ?>"
                                 class="rounded" width="60">
                        <?php else: ?>
                            <span class="text-muted">-</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/mahasiswa/edit/<?= $r['id'] ?>" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/mahasiswa/hapus/<?= $r['id'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Hapus data ini?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function () {
        $('#tableMahasiswa').DataTable();
    });
</script>
<?= $this->endSection() ?>
