<h3>Data Mata Kuliah</h3>

<a href="/matakuliah/tambah">+ Tambah</a>

<table border="1" cellpadding="6">
    <tr>
        <th>Kode</th>
        <th>Nama MK</th>
        <th>SKS</th>
        <th>Aksi</th>
    </tr>

    <?php foreach($list as $r): ?>
    <tr>
        <td><?= $r['kode'] ?></td>
        <td><?= $r['nama_mk'] ?></td>
        <td><?= $r['sks'] ?></td>
        <td>
            <a href="/matakuliah/edit/<?= $r['id'] ?>">Edit</a> |
            <a href="/matakuliah/hapus/<?= $r['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
