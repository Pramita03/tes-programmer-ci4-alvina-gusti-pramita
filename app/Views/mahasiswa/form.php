<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<!-- Judul dinamis: tambah / edit -->
<h1><?= isset($data) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa' ?></h1>

<div class="card form-card">
<form method="post"
      enctype="multipart/form-data"
      action="<?= isset($data) 
                ? base_url('mahasiswa/update/'.$data['id']) 
                : base_url('mahasiswa/simpan') ?>">

    <!-- Input NIM -->
    <label>NIM</label>
    <input type="text" name="nim" value="<?= $data['nim'] ?? '' ?>" required>

    <!-- Input Nama -->
    <label>Nama</label>
    <input type="text" name="nama" value="<?= $data['nama'] ?? '' ?>" required>

    <!-- Pilihan Jenis Kelamin -->
    <label>Jenis Kelamin</label>
    <select name="jk">
        <option value="L" <?= (isset($data) && $data['jenis_kelamin']=='L')?'selected':'' ?>>
            Laki-laki
        </option>
        <option value="P" <?= (isset($data) && $data['jenis_kelamin']=='P')?'selected':'' ?>>
            Perempuan
        </option>
    </select>

    <!-- Input Email -->
    <label>Email</label>
    <input type="email" name="email" value="<?= $data['email'] ?? '' ?>">

    <!-- Upload Foto -->
    <label>Foto</label>
    <input type="file" name="foto">

    <?php if(isset($data)): ?>
        <!-- Menyimpan nama foto lama -->
        <input type="hidden" name="foto_lama" value="<?= $data['foto'] ?>">

        <!-- Preview foto lama -->
        <?php if($data['foto']): ?>
            <img src="<?= base_url('uploads/foto_mahasiswa/'.$data['foto']) ?>"
                 class="img-preview">
        <?php endif; ?>
    <?php endif; ?>

    <!-- Tombol aksi form -->
    <div class="form-action">
        <button type="submit" class="btn-primary">Simpan</button>
        <a href="<?= base_url('mahasiswa') ?>" class="btn-secondary">Kembali</a>
    </div>

</form>
</div>

<?= $this->endSection() ?>
