<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <!-- Judul halaman (bisa dikirim dari controller) -->
    <title><?= esc($title ?? 'Aplikasi Akademik') ?></title>

    <!-- CSS utama aplikasi -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<!-- Navbar atas -->
<div class="navbar">
    <!-- Nama aplikasi -->
    <div class="brand">Aplikasi Akademik</div>

    <!-- Menu navigasi -->
    <div class="nav-menu">
        <a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a>
        <a href="<?= base_url('matakuliah') ?>">Mata Kuliah</a>
        <a href="<?= base_url('krs') ?>">KRS</a>
        <a href="<?= base_url('logout') ?>" class="logout">Logout</a>
    </div>
</div>

<!-- Konten utama -->
<div class="container">
    <?= $this->renderSection('content') ?>
</div>

<!-- Footer -->
<footer class="footer">
    <p>© <?= date('Y') ?> Tes Programmer CI4</p>
</footer>

</body>
</html>
