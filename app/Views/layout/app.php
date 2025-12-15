<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Aplikasi Akademik') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<div class="navbar">
    <div class="brand">Aplikasi Akademik</div>
    <div>
        <a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a>
        <a href="<?= base_url('matakuliah') ?>">Mata Kuliah</a>
        <a href="<?= base_url('krs') ?>">KRS</a>
        <a href="<?= base_url('logout') ?>" class="logout">Logout</a>
    </div>
</div>

<div class="container">
    <?= $this->renderSection('content') ?>
</div>

<footer class="footer">
    <p>© <?= date('Y') ?> Tes Programmer CI4</p>
</footer>

</body>
</html>
