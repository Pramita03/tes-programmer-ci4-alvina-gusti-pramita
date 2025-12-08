<h3>Login Sistem</h3>

<?php if(session()->getFlashdata('pesan')): ?>
    <p style="color:red;"><?= session()->getFlashdata('pesan') ?></p>
<?php endif; ?>

<form method="post" action="/login/cek">
    <label>Email</label>
    <input type="text" name="email">

    <label>Password</label>
    <input type="password" name="password">

    <button type="submit">Masuk</button>
</form>
