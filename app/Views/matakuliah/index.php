<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<!-- Judul halaman -->
<h1>Data Mata Kuliah</h1>

<!-- Tombol tambah data -->
<a href="<?= base_url('matakuliah/tambah') ?>" class="btn-primary">
    + Tambah Mata Kuliah
</a>

<!-- Card pembungkus tabel -->
<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <!-- Loop data mata kuliah dari controller -->
        <?php foreach($list as $r): ?>
            <tr>
                <td><?= esc($r['kode']) ?></td>
                <td><?= esc($r['nama_mk']) ?></td>
                <td><?= esc($r['sks']) ?></td>
                <td class="aksi">
                    <!-- Tombol edit -->
                    <a href="<?= base_url('matakuliah/edit/'.$r['id']) ?>"
                       class="btn-warning">
                        Edit
                    </a>

                    <!-- Tombol hapus dengan konfirmasi -->
                    <a href="<?= base_url('matakuliah/hapus/'.$r['id']) ?>"
                       class="btn-danger"
                       onclick="return confirm('Hapus mata kuliah ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
