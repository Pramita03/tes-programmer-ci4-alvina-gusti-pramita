<h3>Data KRS</h3>

<a href="/krs/tambah">+ Tambah KRS</a>

<table border="1" cellpadding="6">
    <tr>
        <th>Mahasiswa</th>
        <th>Mata Kuliah</th>
        <th>Tahun Akademik</th>
        <th>Semester</th>
        <th>Aksi</th>
    </tr>

    <?php foreach($list as $r): ?>
    <tr>
        <td><?= $r['nama_mahasiswa'] ?></td>
        <td><?= $r['nama_mk'] ?></td>
        <td><?= $r['tahun_akademik'] ?></td>
        <td><?= $r['semester'] ?></td>
        <td>
            <a href="/krs/hapus/<?= $r['id'] ?>" onclick="return confirm('Hapus KRS ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
