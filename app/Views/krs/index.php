<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<!-- Judul halaman -->
<h1>Data KRS</h1>

<!-- Tombol tambah KRS -->
<a href="<?= base_url('krs/tambah') ?>" class="btn-primary">
    + Tambah KRS
</a>

<!-- Card pembungkus tabel -->
<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th>Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Tahun Akademik</th>
                <th>Semester</th>
                <th width="100">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <!-- Loop data KRS dari controller -->
        <?php foreach($list as $r): ?>
            <tr>
                <td><?= esc($r['nama_mahasiswa']) ?></td>
                <td><?= esc($r['nama_mk']) ?></td>
                <td><?= esc($r['tahun_akademik']) ?></td>
                <td><?= esc($r['semester']) ?></td>
                <td class="aksi">
                    <!-- Tombol hapus dengan konfirmasi -->
                    <a href="<?= base_url('krs/hapus/'.$r['id']) ?>"
                       class="btn-danger"
                       onclick="return confirm('Hapus KRS ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
