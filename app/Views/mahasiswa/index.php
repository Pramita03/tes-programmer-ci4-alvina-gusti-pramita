<h3>Data Mahasiswa</h3>

<a href="/mahasiswa/tambah">+ Tambah</a>

<?php if(session()->getFlashdata('pesan')): ?>
    <p><?= session()->getFlashdata('pesan') ?></p>
<?php endif; ?>

<table border="1" cellpadding="6">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>JK</th>
        <th>Email</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

    <?php foreach($list as $r): ?>
    <tr>
        <td><?= $r['nim'] ?></td>
        <td><?= $r['nama'] ?></td>
        <td><?= $r['jenis_kelamin'] ?></td>
        <td><?= $r['email'] ?></td>
        <td>
            <?php if($r['foto']): ?>
                <img src="/uploads/foto_mahasiswa/<?= $r['foto'] ?>" width="60">
            <?php endif; ?>
        </td>
        <td>
            <a href="/mahasiswa/edit/<?= $r['id'] ?>">Edit</a> |
            <a href="/mahasiswa/hapus/<?= $r['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
