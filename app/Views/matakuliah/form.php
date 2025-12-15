<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<!-- Judul dinamis: tambah / edit -->
<h1><?= isset($data) ? 'Edit Mata Kuliah' : 'Tambah Mata Kuliah' ?></h1>

<div class="card form-card">
<form method="post"
      action="<?= isset($data)
                ? base_url('matakuliah/update/'.$data['id'])
                : base_url('matakuliah/simpan') ?>">

    <!-- Input Kode Mata Kuliah -->
    <label>Kode Mata Kuliah</label>
    <input type="text" name="kode"
           value="<?= $data['kode'] ?? '' ?>" required>

    <!-- Input Nama Mata Kuliah -->
    <label>Nama Mata Kuliah</label>
    <input type="text" name="nama_mk"
           value="<?= $data['nama_mk'] ?? '' ?>" required>

    <!-- Input SKS -->
    <label>SKS</label>
    <input type="number" name="sks"
           value="<?= $data['sks'] ?? '' ?>" required>

    <!-- Tombol aksi -->
    <div class="form-action">
        <button type="submit" class="btn-primary">Simpan</button>
        <a href="<?= base_url('matakuliah') ?>" class="btn-secondary">
            Kembali
        </a>
    </div>

</form>
</div>

<?= $this->endSection() ?>
