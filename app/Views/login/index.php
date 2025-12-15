<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>

    <!-- CSS utama aplikasi -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-page">

<div class="login-card">
    <!-- Judul halaman login -->
    <h2>Login Sistem</h2>

    <!-- Menampilkan pesan error login -->
    <?php if(session()->getFlashdata('pesan')): ?>
        <div class="alert-error">
            <?= session()->getFlashdata('pesan') ?>
        </div>
    <?php endif; ?>

    <!-- Form login -->
    <form method="post" action="<?= base_url('login/cek') ?>">
        <?= csrf_field() ?> <!-- Proteksi CSRF -->

        <!-- Input email -->
        <label>Email</label>
        <input type="email" name="email" required>

        <!-- Input password -->
        <label>Password</label>
        <input type="password" name="password" required>

        <!-- Tombol submit -->
        <button type="submit" class="btn-primary btn-block">
            Masuk
        </button>
    </form>
</div>

</body>
</html>
