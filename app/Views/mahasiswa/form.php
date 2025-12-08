<h3><?= isset($data) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa' ?></h3>

<form method="post" enctype="multipart/form-data"
      action="<?= isset($data) ? '/mahasiswa/update/'.$data['id'] : '/mahasiswa/simpan' ?>">

    <label>NIM</label>
    <input type="text" name="nim" value="<?= $data['nim'] ?? '' ?>">

    <label>Nama</label>
    <input type="text" name="nama" value="<?= $data['nama'] ?? '' ?>">

    <label>Jenis Kelamin</label>
    <select name="jk">
        <option value="L" <?= (isset($data) && $data['jenis_kelamin']=='L')?'selected':'' ?>>Laki-laki</option>
        <option value="P" <?= (isset($data) && $data['jenis_kelamin']=='P')?'selected':'' ?>>Perempuan</option>
    </select>

    <label>Email</label>
    <input type="text" name="email" value="<?= $data['email'] ?? '' ?>">

    <label>Foto</label>
    <input type="file" name="foto">

    <?php if(isset($data)): ?>
        <input type="hidden" name="foto_lama" value="<?= $data['foto'] ?>">
        <?php if($data['foto']): ?>
            <img src="/uploads/foto_mahasiswa/<?= $data['foto'] ?>" width="80">
        <?php endif; ?>
    <?php endif; ?>

    <button type="submit">Simpan</button>
</form>
