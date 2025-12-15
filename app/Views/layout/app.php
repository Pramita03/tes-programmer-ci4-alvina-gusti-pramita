<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <!-- Judul halaman (opsional dari controller) -->
    <title><?= esc($title ?? 'Aplikasi Akademik') ?></title>

    <!-- CSS utama aplikasi -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<!-- ================= SIDEBAR ================= -->
<!-- Sidebar dipanggil satu kali di layout -->
<?= view('layout/sidebar') ?>

<!-- ================= KONTEN UTAMA ================= -->
<!-- margin-left disesuaikan dengan lebar sidebar -->
<div class="container" style="margin-left:260px; padding:20px">
    <?= $this->renderSection('content') ?>
</div>

<!-- ================= FOOTER ================= -->
<footer class="footer" style="margin-left:260px">
    <p>© <?= date('Y') ?> Tes Programmer CI4</p>
</footer>

</body>
</html>
