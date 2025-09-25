<?php
/**
 * Simple login view
 * Expects flash data 'error' for invalid credentials
 */
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <style>
        body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial;margin:0;display:flex;align-items:center;justify-content:center;height:100vh;background:#f7f7f7}
        .card{background:#fff;padding:20px;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,.08);width:320px}
        input{width:100%;padding:8px;margin:8px 0;border:1px solid #ddd;border-radius:4px}
        button{width:100%;padding:10px;background:#007bff;color:#fff;border:none;border-radius:4px}
        a{color:#007bff}
    </style>
</head>
<body>
    <div class="card">
        <h2 style="margin:0 0 12px 0">Login</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div style="color:#b00020;margin-bottom:10px;font-size:14px"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif ?>

        <form method="post" action="<?= site_url('login') ?>">
            <?= csrf_field() ?>
            <input type="text" id="nama" name="nama" placeholder="Nama" required value="<?= esc(old('nama')) ?>">
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <p style="text-align:center;margin:12px 0 0 0;font-size:14px">Belum punya akun? <a href="<?= site_url('register') ?>">Daftar</a></p>
    </div>
</body>
</html>
