<h3>Tambah KRS</h3>

<form method="post" action="/krs/simpan">

    <label>Mahasiswa</label>
    <select name="mhs">
        <?php foreach($mahasiswa as $m): ?>
            <option value="<?= $m['id'] ?>"><?= $m['nama'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Mata Kuliah</label>
    <select name="mk">
        <?php foreach($matakuliah as $mk): ?>
            <option value="<?= $mk['id'] ?>"><?= $mk['nama_mk'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Tahun Akademik</label>
    <input type="text" name="tahun" placeholder="2024/2025">

    <label>Semester</label>
    <select name="semester">
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
    </select>

    <button type="submit">Simpan</button>
</form>
