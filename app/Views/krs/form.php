<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<!-- Judul halaman -->
<h1>Tambah KRS</h1>

<div class="card form-card">
<form method="post" action="<?= base_url('krs/simpan') ?>">

    <!-- Pilih mahasiswa -->
    <label>Mahasiswa</label>
    <select name="mhs" required>
        <?php foreach($mahasiswa as $m): ?>
            <option value="<?= $m['id'] ?>">
                <?= esc($m['nama']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- Pilih mata kuliah -->
    <label>Mata Kuliah</label>
    <select name="mk" required>
        <?php foreach($matakuliah as $mk): ?>
            <option value="<?= $mk['id'] ?>">
                <?= esc($mk['nama_mk']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- Input tahun akademik -->
    <label>Tahun Akademik</label>
    <input type="text" name="tahun"
           placeholder="2024/2025" required>

    <!-- Pilih semester -->
    <label>Semester</label>
    <select name="semester">
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
    </select>

    <!-- Tombol aksi -->
    <div class="form-action">
        <button type="submit" class="btn-primary">Simpan</button>
        <a href="<?= base_url('krs') ?>" class="btn-secondary">
            Kembali
        </a>
    </div>

</form>
</div>

<?= $this->endSection() ?>
