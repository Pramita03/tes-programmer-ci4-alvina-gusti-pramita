<h3><?= isset($data) ? 'Edit Mata Kuliah' : 'Tambah Mata Kuliah' ?></h3>

<form method="post" action="<?= isset($data) ? '/matakuliah/update/'.$data['id'] : '/matakuliah/simpan' ?>">

    <label>Kode Mata Kuliah</label>
    <input type="text" name="kode" value="<?= $data['kode'] ?? '' ?>">

    <label>Nama Mata Kuliah</label>
    <input type="text" name="nama_mk" value="<?= $data['nama_mk'] ?? '' ?>">

    <label>SKS</label>
    <input type="number" name="sks" value="<?= $data['sks'] ?? '' ?>">

    <button type="submit">Simpan</button>
</form>
