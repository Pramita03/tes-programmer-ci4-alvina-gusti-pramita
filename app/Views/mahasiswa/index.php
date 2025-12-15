<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<!-- Judul halaman -->
<h1>Data Mahasiswa</h1>

<!-- Tombol menuju halaman tambah data -->
<a href="<?= base_url('mahasiswa/tambah') ?>" class="btn-primary">
    + Tambah Mahasiswa
</a>

<!-- Menampilkan pesan flash (setelah tambah/edit/hapus) -->
<?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert-success">
        <?= session()->getFlashdata('pesan') ?>
    </div>
<?php endif; ?>

<!-- Card pembungkus tabel -->
<div class="card">
    <table class="table">
        <thead>
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
        <!-- Loop data mahasiswa dari controller -->
        <?php foreach($list as $r): ?>
            <tr>
                <td><?= esc($r['nim']) ?></td>
                <td><?= esc($r['nama']) ?></td>
                <td><?= esc($r['jenis_kelamin']) ?></td>
                <td><?= esc($r['email']) ?></td>
                <td>
                    <!-- Tampilkan foto jika ada -->
                    <?php if($r['foto']): ?>
                        <img src="<?= base_url('uploads/foto_mahasiswa/'.$r['foto']) ?>"
                             class="img-thumb">
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td class="aksi">
                    <!-- Tombol edit data -->
                    <a href="<?= base_url('mahasiswa/edit/'.$r['id']) ?>" class="btn-warning">
                        Edit
                    </a>

                    <!-- Tombol hapus dengan konfirmasi -->
                    <a href="<?= base_url('mahasiswa/hapus/'.$r['id']) ?>"
                       class="btn-danger"
                       onclick="return confirm('Hapus data ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
