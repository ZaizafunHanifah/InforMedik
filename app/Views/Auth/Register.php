<?php if (session()->getFlashdata('error')): ?>
    <div style="color:#b00020;margin-bottom:10px;font-size:14px">
        <?= esc(session()->getFlashdata('error')) ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div style="color:#007b00;margin-bottom:10px;font-size:14px">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register</title>
    <style>
        body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial;margin:0;display:flex;align-items:center;justify-content:center;height:100vh;background:#f7f7f7}
        .card{background:#fff;padding:20px;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,.08);width:320px}
        input{width:100%;padding:8px;margin:8px 0;border:1px solid #ddd;border-radius:4px}
        button{width:100%;padding:10px;background:#28a745;color:#fff;border:none;border-radius:4px;cursor:pointer}
        a{color:#007bff;text-decoration:none}
    </style>
</head>
<body>
    <div class="card">
        <h2 style="margin:0 0 12px 0">Daftar</h2>

        <form method="POST" action="<?= base_url('register') ?>">
            <?= csrf_field() ?>
            <input type="text" id="nama" name="nama" placeholder="Nama" required value="<?= esc(old('nama')) ?>">
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Daftar</button>
        </form>

        <p style="text-align:center;margin:12px 0 0 0;font-size:14px">
            Sudah punya akun? <a href="<?= base_url('login') ?>">Login</a>
        </p>
    </div>
</body>
</html>
