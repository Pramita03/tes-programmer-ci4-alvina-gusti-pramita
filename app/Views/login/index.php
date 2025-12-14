<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height:100vh">

<div class="card shadow" style="width:380px">
    <div class="card-body">
        <h4 class="text-center mb-4">Login Sistem</h4>

        <?php if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="/login/cek">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">
                <i class="fa fa-sign-in-alt"></i> Masuk
            </button>
        </form>
    </div>
</div>

</body>
</html>
